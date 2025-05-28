<?php

namespace App\Filament\Resources\CollegeResource\RelationManagers;

use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartmentRelationManager extends RelationManager
{
    protected static string $relationship = 'department';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('department_name')
                    ->required()
                    ->maxLength(255),
                    TextInput::make('department_description')
                    ->label('وصف القسم')
                    ->maxLength(500),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('department_name')
            ->columns([
                Tables\Columns\TextColumn::make('department_name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
