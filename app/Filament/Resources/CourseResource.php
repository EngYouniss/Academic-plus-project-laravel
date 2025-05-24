<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
protected static ?int $navigationSort=6;
    protected static ?string $navigationGroup = ' ادارة أكاديمية';
    protected static ?string $navigationLabel = 'المقررات الدراسية';
    protected static ?string $modelLabel = 'مقرر دراسي';
    protected static ?string $pluralModelLabel = 'المقررات الدراسية';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('course_name')
                    ->required()
                    ->maxLength(255)->label('اسم المقرر الدراسي'),
                TextInput::make('course_description')
                    ->maxLength(255)->label('وصف المقرر الدراسي'),
                    TextInput::make('course_code')
                    ->required()
                    ->maxLength(255)->label('كود المقرر الدراسي'),
                   Select::make('semester_id')
                    ->relationship('semester', 'semester_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم الفصل الدراسي'),
                Select::make('level_id')
                    ->relationship('level', 'level_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم المستوى الدراسي'),
                Select::make('department_id')
                    ->relationship('department', 'department_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم القسم'),
                Select::make('college_id')
                    ->relationship('college', 'college_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم الكلية'),
                Select::make('university_id')
                    ->relationship('university', 'university_name')
                    ->required()
                    ->searchable()
                    ->preload()->label('اسم الجامعة'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course_name')
                    ->searchable()->label('اسم المقرر الدراسي'),
                TextColumn::make('course_description')
                    ->searchable()->label('وصف المقرر الدراسي'),
                TextColumn::make('course_code')
                    ->searchable()->label('كود المقرر الدراسي'),
                TextColumn::make('semester.semester_name')
                    ->searchable()->label('اسم الفصل الدراسي'),
                TextColumn::make('level.level_name')
                    ->searchable()->label('اسم المستوى الدراسي'),
                TextColumn::make('department.department_name')
                    ->searchable()->label('اسم القسم'),
                TextColumn::make('college.college_name')
                    ->searchable()->label('اسم الكلية'),
                TextColumn::make('university.university_name')
                    ->searchable()->label('اسم الجامعة'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()->label('تاريخ الانشاء')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()->label('تاريخ التحديث')
                    ->toggleable(isToggledHiddenByDefault: true),
                    ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCourses::route('/'),
        ];
    }
}
