<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UniversitiesWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('📚 عدد الجامعات', \App\Models\University::count())
                ->description('إجمالي عدد الجامعات المسجلة')
                ->icon('heroicon-o-building-library')
                ->color('primary')
                ->chart([12, 14, 16, 15, 18, 20, 22])
                   ->url(route('filament.admin.resources.universities.create'))
    ->openUrlInNewTab()

                ,

            Stat::make('🏛️ عدد الكليات', \App\Models\College::count())
                ->description('إجمالي الكليات عبر جميع الجامعات')
                ->icon('heroicon-o-building-office')
                ->color('success')
                ->chart([10, 12, 11, 13, 17, 19, 21])
                ->descriptionIcon('heroicon-o-arrow-trending-up'),

            Stat::make('🎓 عدد الأقسام', \App\Models\Department::count())
                ->description('جميع الأقسام الأكاديمية')
                ->icon('heroicon-o-academic-cap')
                ->color('warning'),


            Stat::make('📖 عدد المستويات', \App\Models\Level::count())
                ->description('إجمالي المستويات الدراسية')
                ->icon('heroicon-o-book-open')
                ->color('danger'),
            Stat::make('📚 الموارد العلمية', \App\Models\Course::count())
                ->description('إجمالي الموارد العلمية ')
                ->icon('heroicon-o-bookmark')
                ->color('info'),

            Stat::make('📘 عدد اصناف ال', \App\Models\CourseCategory::count())
                ->description('إجمالي الكتب الدراسية')
                ->icon('heroicon-o-book-open')
                ->color('secondary'),



        ];
    }
}
