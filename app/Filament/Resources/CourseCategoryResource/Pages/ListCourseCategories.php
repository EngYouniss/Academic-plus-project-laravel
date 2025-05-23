<?php

namespace App\Filament\Resources\CourseCategoryResource\Pages;

use App\Filament\Resources\CourseCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseCategories extends ListRecords
{
    protected static string $resource = CourseCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
