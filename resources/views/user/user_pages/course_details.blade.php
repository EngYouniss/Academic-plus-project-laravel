{{-- @extends('user.layout.master')
<link rel="stylesheet" href="{{asset('user/style/course_details.css')}}">
@section('title', 'تفاصيل المادة الدراسية')

@section('content')

<div class="legendary-course-page">
    <!-- Hero Section -->
    <div class="course-hero">
        <div class="hero-content">
            <span class="course-badge">CS101</span>
            <h1 class="course-title">برمجة 1</h1>
            <p class="course-description">اكتشف عالم البرمجة من خلال مصادرنا التعليمية الشاملة</p>
        </div>
        <div class="hero-pattern"></div>
    </div>

    <!-- Course Sections Grid -->
    <div class="sections-grid">
        <!-- References Card -->
        <a href="{{route('course.referencespart')}}" class="section-card legendary-card">
            <div class="card-icon">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-content">
                <h3>المراجع</h3>
                <p>12 مرجع متاح</p>
            </div>
            <div class="card-hover-effect"></div>
            <div class="card-badge">📚</div>
        </a>

        <!-- Courses Card -->
        <a href="#" class="section-card legendary-card">
            <div class="card-icon">
                <i class="fas fa-video"></i>
            </div>
            <div class="card-content">
                <h3>الكورسات</h3>
                <p>8 دروس تعليمية</p>
            </div>
            <div class="card-hover-effect"></div>
            <div class="card-badge">🎬</div>
        </a>

        <!-- Summaries Card -->
        <a href="#" class="section-card legendary-card">
            <div class="card-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="card-content">
                <h3>الملخصات</h3>
                <p>5 ملخصات متميزة</p>
            </div>
            <div class="card-hover-effect"></div>
            <div class="card-badge">📝</div>
        </a>

        <!-- Exams Card -->
        <a href="#" class="section-card legendary-card">
            <div class="card-icon">
                <i class="fas fa-pencil-alt"></i>
            </div>
            <div class="card-content">
                <h3>الاختبارات</h3>
                <p>3 اختبارات تقييمية</p>
            </div>
            <div class="card-hover-effect"></div>
            <div class="card-badge">✏️</div>
        </a>
    </div>

    <!-- Floating Icons -->
    <div class="floating-elements">
        <i class="floating-icon fa fa-code"></i>
        <i class="floating-icon fa fa-laptop"></i>
        <i class="floating-icon fa fa-server"></i>
    </div>
</div>

@endsection --}}


@extends('user.layout.master')
<link rel="stylesheet" href="{{ asset('user/style/course_details.css') }}">
@section('title', 'مراجع المادة الدراسية')

@section('content')
    <div class="legendary-references-page">
        <!-- Hero Section -->
        <div class="references-hero">
            <div class="container">
                @if ($courses)
                    <div class="hero-content">
                        <h1 class="hero-title"> {{ $courses->course_name }} </h1>
                        <p class="hero-description">{{ $courses->course_description }}</p>
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
                        <button class="filter-tag active">الكل</button>
                        <button class="filter-tag">الكتب</button>
                        <button class="filter-tag">الأبحاث</button>
                        <button class="filter-tag">الملخصات</button>
                        <button class="filter-tag">الكورسات</button>
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
       <div class="container">
    <div class="references-grid">
        @if ($courseContents->count() > 0)
            @foreach ($courseContents as $content)

                <div class="reference-card" data-type="{{ $content->content_type }}">
                    <div class="card-badge">
                        @switch($content->content_type)
                            @case('book')
                                <i class="fas fa-book"></i>
                                @break
                            @case('research')
                                <i class="fas fa-search"></i>
                                @break
                            @case('summary')
                                <i class="fas fa-file-alt"></i>
                                @break
                            @case('فيديو')
                                <i class="fas fa-chalkboard-teacher"></i>
                                @break
                            @case('video')
                                <i class="fas fa-video"></i>
                                @break
                            @case('audio')
                                <i class="fas fa-headphones"></i>
                                @break
                            @default
                                <i class="fas fa-file-pdf"></i>
                        @endswitch
                    </div>

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
                <h4>لا توجد مراجع متاحة</h4>
                <p>لم يتم إضافة أي مراجع لهذه المادة بعد</p>
                <button class="btn-notify">إعلامي عند الإضافة</button>
            </div>
        @endif
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // معاينة الملف
        document.querySelectorAll('.preview-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const previewUrl = this.getAttribute('data-preview');
                // هنا يمكنك إضافة منطق عرض المعاينة
                console.log('عرض معاينة لـ:', previewUrl);
                window.open(previewUrl, '_blank');
            });
        });

        // إعلام المستخدم عند توفر محتوى جديد
        document.querySelector('.btn-notify')?.addEventListener('click', function() {
            alert('سيتم إعلامك عند إضافة مراجع جديدة لهذه المادة');
        });
    });
</script>



    </div>




@endsection
