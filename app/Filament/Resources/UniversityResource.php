<?php

namespace App\Filament\Resources;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use App\Filament\Resources\UniversityResource\Pages;
use App\Filament\Resources\UniversityResource\RelationManagers;
use App\Models\University;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UniversityResource extends Resource
{
    protected static ?string $model = University::class;
    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'الجامعات';
    protected static ?string $modelLabel = 'جامعة';
    protected static ?string $pluralModelLabel = 'الجامعات';

protected static ?int $navigationSort=1;
    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('university_name')
                    ->required()
                    ->maxLength(255)->label('اسم الجامعة'),
                Forms\Components\TextInput::make('university_location')
                    ->required()
                    ->maxLength(255)->label('موقع الجامعة'),

                    Select::make('university_type')
                    ->options([
                        'Public' => 'Government',
                        'Private' => 'private',
                    ])->label('نوع الجامعة')
                    ->required(),
                FileUpload::make('university_logo')
                    ->label('University Logo')
                    ->disk('public')
                    ->directory('university_logos')->label('شعار الجامعة')
                    ,
                Forms\Components\Textarea::make('university_description')
                    ->columnSpanFull()->label('وصف الجامعة'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('university_name')
                    ->searchable()->label('اسم الجامعة'),
                Tables\Columns\TextColumn::make('university_location')
                    ->searchable()->label('موقع الجامعة'),
                Tables\Columns\TextColumn::make('university_type')
                    ->searchable()->label('نوع الجامعة'),
               ImageColumn::make('university_logo')
                    ->label('University Logo')
                    ->disk('public')
                    ->size(50)
                    ->circular()->label('شعار الجامعة')
                    ,
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()->label('تاريخ الانشاء'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()->label('تاريخ التحديث')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUniversities::route('/'),
            'create' => Pages\CreateUniversity::route('/create'),
            'edit' => Pages\EditUniversity::route('/{record}/edit'),
        ];
    }
}
