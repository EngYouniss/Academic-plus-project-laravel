<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseCategoryResource\Pages;
use App\Filament\Resources\CourseCategoryResource\RelationManagers;
use App\Models\CourseCategory;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseCategoryResource extends Resource
{
    protected static ?string $model = CourseCategory::class;
    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'فئات المقررات الدراسية';
    protected static ?string $modelLabel = 'فئة مقرر دراسي';
    protected static ?string $pluralModelLabel = 'فئات المقررات الدراسية';
    protected static ?string $navigationIcon = 'heroicon-o-tag';
protected static ?int $navigationSort=7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('category_name')
                    ->required()
                    ->maxLength(255)->label('اسم الفئة'),
                Forms\Components\Textarea::make('category_description')
                    ->columnSpanFull()->label('وصف الفئة'),
                Select::make('course_id')
                    ->relationship('course', 'course_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم المقرر الدراسي'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_name')
                    ->searchable()->label('اسم الفئة'),
                Tables\Columns\TextColumn::make('course_id')
                    ->numeric()
                    ->sortable()->label('اسم المقرر الدراسي'),
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
            'index' => Pages\ListCourseCategories::route('/'),
            'create' => Pages\CreateCourseCategory::route('/create'),
            'edit' => Pages\EditCourseCategory::route('/{record}/edit'),
        ];
    }
}
