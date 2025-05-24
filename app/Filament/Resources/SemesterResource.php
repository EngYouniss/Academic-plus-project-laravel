<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SemesterResource\Pages;
use App\Filament\Resources\SemesterResource\RelationManagers;
use App\Models\Semester;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SemesterResource extends Resource
{
    protected static ?string $model = Semester::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
protected static ?int $navigationSort=5;
    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'الفصول الدراسية';
    protected static ?string $modelLabel = 'فصل دراسي';
    protected static ?string $pluralModelLabel = 'الفصول الدراسية';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('semester_name')
                    ->required()
                    ->maxLength(255)->label('اسم الفصل الدراسي'),
                Forms\Components\Textarea::make('semester_description')
                    ->columnSpanFull()->label('وصف الفصل الدراسي'),
                Select::make('level_id')
                    ->relationship('level', 'level_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم المستوى الدراسي'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('semester_name')
                    ->searchable()->label('اسم الفصل الدراسي'),
                Tables\Columns\TextColumn::make('level_id')
                    ->numeric()
                    ->sortable()->label('اسم المستوى الدراسي'),
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
            'index' => Pages\ListSemesters::route('/'),
            'create' => Pages\CreateSemester::route('/create'),
            'edit' => Pages\EditSemester::route('/{record}/edit'),
        ];
    }
}
