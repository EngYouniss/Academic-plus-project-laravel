<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UniversityResource\Pages;
use App\Filament\Resources\UniversityResource\RelationManagers\CollegesRelationManager;
use App\Models\University;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\QueryException;

class UniversityResource extends Resource
{
    protected static ?string $model = University::class;

    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'الجامعات';
    protected static ?string $modelLabel = 'جامعة';
    protected static ?string $pluralModelLabel = 'الجامعات';

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('university_name')
                    ->required()
                    ->maxLength(255)
                    ->label('اسم الجامعة'),
                Forms\Components\TextInput::make('university_location')
                    ->required()
                    ->maxLength(255)
                    ->label('موقع الجامعة'),

                Select::make('university_type')
                    ->options([
                        'حكومية' => 'حكومية',
                        'خاصة' => 'خاصة',
                    ])
                    ->label('نوع الجامعة')
                    ->required(),

                FileUpload::make('university_logo')
                    ->label('شعار الجامعة')
                    ->disk('public')
                    ->directory('university_logos'),

                Forms\Components\Textarea::make('university_description')
                    ->columnSpanFull()
                    ->label('وصف الجامعة'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('university_name')
                    ->searchable()
                    ->label('اسم الجامعة'),
                Tables\Columns\TextColumn::make('university_location')
                    ->searchable()
                    ->label('موقع الجامعة'),
                Tables\Columns\TextColumn::make('university_type')
                    ->searchable()
                    ->label('نوع الجامعة'),
                ImageColumn::make('university_logo')
                    ->label('شعار الجامعة')
                    ->disk('public')
                    ->size(50)
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('تاريخ الإنشاء'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('تاريخ التحديث')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                DeleteAction::make()
                    ->action(function ($record) {
                        try {
                            $record->delete();

                            Notification::make()
                                ->title('تم حذف الجامعة بنجاح')
                                ->success()
                                ->send();
                        } catch (QueryException $e) {
                            if ($e->getCode() === '23000') {
                                Notification::make()
                                    ->title('لا يمكن حذف الجامعة لأنها مرتبطة بكليات.')
                                    ->danger()
                                    ->send();
                            } else {
                                Notification::make()
                                    ->title('حدث خطأ أثناء الحذف.')
                                    ->danger()
                                    ->send();
                            }
                        }
                    }),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                try {
                                    $record->delete();
                                } catch (QueryException $e) {
                                    Notification::make()
                                        ->title('تعذر حذف بعض الجامعات بسبب ارتباطها بكليات.')
                                        ->danger()
                                        ->send();
                                    break;
                                }
                            }
                        }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CollegesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => pages\ListUniversities::route('/'),
            'create' => Pages\CreateUniversity::route('/create'),
            'edit' => Pages\EditUniversity::route('/{record}/edit'),
        ];
    }
}
