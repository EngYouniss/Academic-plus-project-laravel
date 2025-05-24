<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollegeResource\Pages;
use App\Filament\Resources\CollegeResource\RelationManagers;
use App\Models\College;
use App\Models\University;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CollegeResource extends Resource
{
    protected static ?string $model = College::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'الكليات';
    protected static ?string $modelLabel = 'كلية';
    protected static ?string $pluralModelLabel = 'الكليات';
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات اساسية')->schema([
                    Forms\Components\TextInput::make('college_name')
                    ->required()
                    ->maxLength(255)->label('اسم الكلية'),
                Select::make('university_id')->relationship(
                    'university',
                    'university_name'
                )->label('اسم الجامعة'),
                ])->columns(2),
                    Section::make('معلومات فرعية ')->schema([
                        Forms\Components\Textarea::make('college_description')
                    ->label('وصف الكلية'),
                FileUpload::make('college_logo')
                    ->label('College Logo')
                    ->image()
                    ->disk('public')
                    ->directory('college_logos')->label('شعار الكلية')
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('college_name')
                    ->searchable()->label('اسم الكلية'),
                Tables\Columns\TextColumn::make('university.university_name')
                    ->numeric()
                    ->sortable()->label('اسم الجامعة'),
                ImageColumn::make('college_logo')
                    ->label('College Logo')
                    ->disk('public')
                    ->size(50)
                    ->circular()->label('شعار الكلية'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()->label('تاريخ الانشاء')
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListColleges::route('/'),
            'create' => Pages\CreateCollege::route('/create'),
            'edit' => Pages\EditCollege::route('/{record}/edit'),
        ];
    }
}
