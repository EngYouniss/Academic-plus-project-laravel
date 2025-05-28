<?php

namespace App\Filament\Resources\UniversityResource\RelationManagers;

use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CollegesRelationManager extends RelationManager
{
    protected static string $relationship = 'colleges';

    public function form(Form $form): Form
    {
            return $form
                ->schema([
                    Grid::make(1)->schema([

                    Forms\Components\TextInput::make('college_name')
                        ->required()
                        ->maxLength(255),
                        TextInput::make('college_description')
                        ->label('وصف الكلية')
                        ->maxLength(500),
                        FileUpload::make('college_logo')
                        ->label('شعار الكلية')
                        ->disk('public')
                        ->directory('college_logos'),
                ])
                    ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('college_name')
            ->columns([
                Tables\Columns\TextColumn::make('college_name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->modalWidth('sm'),
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
