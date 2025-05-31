@extends('user.layout.master')
<link rel="stylesheet" href="{{ asset('user/style/course_details.css') }}">
@section('title', 'مراجع المادة الدراسية')

@section('content')
    <div class="legendary-references-page">
        <!-- Hero Section -->
        <div class="references-hero">
            <div class="container">
                @if ($course)
                    <div class="hero-content">
                        <h1 class="hero-title"> {{ $course->course_name }} </h1>
                        <p class="hero-description">{{ $course->course_description }}</p>
                    </div>
                @else
                    <p>لم يتم العثور على الكورس.</p>
                @endif
            </div>
            <div class="hero-pattern"></div>
        </div>

        <!-- Filters -->
        <div class="filters-section">
            <div class="container">
                <div class="filters-wrapper">
                  <div class="filter-tags">
    <a href="{{ route('course_details', $course->id) }}" class="filter-tag {{ request('type') == null ? 'active' : '' }}">الكل</a>
    <a href="{{ route('course_details', ['id' => $course->id, 'type' => 'كتاب']) }}" class="filter-tag {{ request('type') == 'كتاب' ? 'active' : '' }}">الكتب</a>
    <a href="{{ route('course_details', ['id' => $course->id, 'type' => 'ملخص']) }}" class="filter-tag {{ request('type') == 'ملخص' ? 'active' : '' }}">الملخصات</a>
    <a href="{{ route('course_details', ['id' => $course->id, 'type' => 'كورس']) }}" class="filter-tag {{ request('type') == 'كورس' ? 'active' : '' }}">الكورسات</a>
        <a href="{{ route('course_details', ['id' => $course->id, 'type' => 'اختبار']) }}" class="filter-tag {{ request('type') == 'اختبار' ? 'active' : '' }}">الأختبارات</a>

</div>


                    <div class="sort-dropdown">
                        <select>
                            <option>الأحدث</option>
                            <option>الأقدم</option>
                            <option>الأكثر تحميلاً</option>
                            <option>الأعلى تقييماً</option>
                        </select>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="container">
            <div class="references-grid">
                @if ($courseContents->count() > 0)
                    @foreach ($courseContents as $content)
                        <div class="reference-card" data-type="{{ $content->content_type }}">


                            <div class="card-content">
                                <div class="content-header">
                                    <h3>{{ $content->content_name }}</h3>
                                    <span class="content-type">{{ $content->content_type }}</span>
                                </div>
                                <p class="content-description">{{ $content->content_description }}</p>

                                <div class="card-meta">
                                    <span><i class="fas fa-calendar-alt"></i> {{ $content->created_at->diffForHumans() }}</span>
                                    <span><i class="fas fa-download"></i> {{ $content->downloads_count ?? 0 }}</span>
                                    <span><i class="fas fa-star"></i> {{ $content->rating ?? '0.0' }}</span>
                                </div>
                            </div>

                            <div class="card-actions">
                                <a href="{{ $content->file_url }}" class="download-btn" download>
                                    <i class="fas fa-download"></i> تحميل
                                </a>
                                <button class="preview-btn" data-preview="{{ $content->preview_url }}">
                                    <i class="fas fa-eye"></i> معاينة
                                </button>
                            </div>

                            <div class="card-hover-effect"></div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h4>لا يوجداي  {{request('type')}} متاح </h4>
                        <p>لم يتم إضافة أي {{request('type')}} لهذه المادة بعد</p>
                        <button class="btn-notify">إعلامي عند الإضافة</button>
                    </div>
                @endif
            </div>
        </div>


    </div>
@endsection
