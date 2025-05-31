<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseContentResource\Pages;
use App\Filament\Resources\CourseContentResource\RelationManagers;
use App\Models\CourseContent;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseContentResource extends Resource
{
    protected static ?string $model = CourseContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
protected static ?int $navigationSort=8;
    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'محتوى المقرر الدراسي';
    protected static ?string $modelLabel = 'محتوى المقرر الدراسي';
    protected static ?string $pluralModelLabel = 'محتوى المقرر الدراسي';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('content_name')
                    ->required()
                    ->maxLength(255)->label('اسم المحتوى'),

                Select::make('course_id')
                    ->relationship('course', 'course_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم المقرر الدراسي'),
                Select::make('content_type')
                    ->options([
                        'اختبار' => 'اختبار',
                        'كتاب' => 'كتاب',
                        'ملخص' => ' ملخص',
                        'كورس' => 'كورس',
                    ])
                    ->required()
                    ->default('book')
                    ->label('نوع المحتوى'),
                Forms\Components\TextInput::make('content_url')
                    ->maxLength(255)
                    ->default(null)->label('رابط المحتوى'),
                    Section::make([
                        Forms\Components\TextInput::make('content_order')
                    ->required()
                    ->numeric()
                    ->default(0)->label('ترتيب المحتوى'),
                Forms\Components\Checkbox::make('is_free')
                    ->label(' محتوى مجاني')->default(true),

                    ] )->columns(2),
                     Forms\Components\Textarea::make('content_description')
                     ->columnSpanFull()
                    ->label('وصف المحتوى'),

            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('content_name')
                    ->searchable()->label('اسم المحتوى'),
                Tables\Columns\TextColumn::make('course_id')
                    ->numeric()
                    ->sortable()->label('اسم المقرر الدراسي'),
                Tables\Columns\TextColumn::make('content_type')
                    ->searchable()->label('نوع المحتوى'),
                Tables\Columns\TextColumn::make('content_url')
                    ->searchable()->label('رابط المحتوى'),
                Tables\Columns\TextColumn::make('content_order')
                    ->numeric()
                    ->sortable()->label('ترتيب المحتوى'),
                Tables\Columns\IconColumn::make('is_free')
                    ->boolean()->label(' محتوى مجاني'),
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
            'index' => Pages\ListCourseContents::route('/'),
            'create' => Pages\CreateCourseContent::route('/create'),
            'edit' => Pages\EditCourseContent::route('/{record}/edit'),
        ];
    }
}
