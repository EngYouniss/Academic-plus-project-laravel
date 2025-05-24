<?php

namespace App\Filament\Resources\CourseContentResource\Pages;

use App\Filament\Resources\CourseContentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseContent extends EditRecord
{
    protected static string $resource = CourseContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
