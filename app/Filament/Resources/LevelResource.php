<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LevelResource\Pages;
use App\Filament\Resources\LevelResource\RelationManagers;
use App\Models\Level;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class LevelResource extends Resource
{
    protected static ?string $model = Level::class;
protected static ?int $navigationSort=4;
    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'المستويات الدراسية';
    protected static ?string $modelLabel = 'مستوى دراسي';
    protected static ?string $pluralModelLabel = 'المستويات الدراسية';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('level_name')
                    ->required()
                    ->maxLength(255)->label('اسم المستوى الدراسي'),
                Forms\Components\Textarea::make('level_description')
                    ->columnSpanFull()->label('وصف المستوى الدراسي'),
                Select::make('department_id')
                    ->relationship('department', 'department_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم القسم'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('level_name')
                    ->searchable()->label('اسم المستوى الدراسي'),
                Tables\Columns\TextColumn::make('department_id')
                    ->numeric()
                    ->sortable()->label('اسم القسم'),
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
            'index' => Pages\ListLevels::route('/'),
            'create' => Pages\CreateLevel::route('/create'),
            'edit' => Pages\EditLevel::route('/{record}/edit'),
        ];
    }
}
