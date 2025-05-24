<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartmentResource\Pages;
use App\Filament\Resources\DepartmentResource\RelationManagers;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;
    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'الأقسام';
    protected static ?string $modelLabel = 'قسم دراسي';
    protected static ?string $pluralModelLabel = 'الأقسام الدراسية';
    protected static ?string $navigationIcon = 'heroicon-o-bars-4';
protected static ?int $navigationSort=3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات اساسية')->schema([Forms\Components\TextInput::make('department_name')
                    ->required()
                    ->maxLength(255)->label('اسم القسم'),
                Select::make('college_id')
                ->relationship('college','college_name')->label('اسم الكلية')
                    ->required(),])->columns(2),
                    Section::make('معلومات فرعية')->schema([
                        Forms\Components\Textarea::make('department_description')
                            ->label('وصف القسم')->rows(5),
                    ])->columns(1),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('department_name')
                    ->searchable()->label('اسم القسم'),
                Tables\Columns\TextColumn::make('college.college_name')
                    ->numeric()
                    ->sortable()->label('اسم الكلية'),
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
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
