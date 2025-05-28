<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollegeResource\Pages;
use App\Filament\Resources\CollegeResource\RelationManagers\DepartmentRelationManager;
use App\Models\College;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
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

class CollegeResource extends Resource
{
    protected static ?string $model = College::class;

    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'الكليات';
    protected static ?string $modelLabel = 'كلية';
    protected static ?string $pluralModelLabel = 'الكليات';

    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('college_name')
                    ->required()
                    ->maxLength(255)
                    ->label('اسم الكلية'),

                Select::make('university_id')
                    ->relationship('university', 'university_name')
                    ->label('الجامعة التابعة')
                    ->required(),

                    Section::make([
                          FileUpload::make('college_logo')
                    ->label('شعار الكلية')
                    ->disk('public')
                    ->directory('college_logos'),

                Forms\Components\Textarea::make('college_description')
                     ->label('وصف الكلية')->minLength(10)->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('college_name')
                    ->searchable()
                    ->label('اسم الكلية'),
                Tables\Columns\TextColumn::make('college_location')
                    ->searchable()
                    ->label('موقع الكلية'),
                Tables\Columns\TextColumn::make('university.university_name')
                    ->searchable()
                    ->label('الجامعة التابعة'),
                ImageColumn::make('college_logo')
                    ->label('شعار الكلية')
                    ->disk('public')
                    ->size(50)
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('تاريخ الإنشاء')->toggleable(isToggledHiddenByDefault: true),
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
                DeleteAction::make()->hidden()
                    ->action(function ($record) {
                        try {
                            $record->delete();

                            Notification::make()
                                ->title('تم حذف الكلية بنجاح')
                                ->success()
                                ->send();
                        } catch (QueryException $e) {
                            if ($e->getCode() === '23000') {
                                Notification::make()
                                    ->title('لا يمكن حذف الكلية لأنها مرتبطة بأقسام.')
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
                                        ->title('تعذر حذف بعض الكليات بسبب ارتباطها بسجلات أخرى.')
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
            DepartmentRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListColleges::route('/'),
            'create' => Pages\CreateCollege::route('/create'),
            'edit' => Pages\EditCollege::route('/{record}/edit'),
        ];
    }
}
