<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Static_;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort=10;
    protected static ?string $navigationGroup = ' ادارة المستخدمين';
    protected static ?string $pluralLabel='الادوار';
    protected static ?string $pluralModelLabel='الادوار';
        protected static ?string $modelLabel='دور';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                Section::make([
                TextInput::make('name')
                ->required()
                ->placeholder('ادمن')->label('الدور'),
                TextInput::make('display_name')
                ->required()->label('الاسم الظاهر'),
                TextInput::make('decription')->label('الوصف'),
              ]  )
                ->columns(2),



             ]) ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('الدور'),
                TextColumn::make('display_name')->label('الاسم الظاهر '),
                TextColumn::make('decription')->label('الوصف'),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
