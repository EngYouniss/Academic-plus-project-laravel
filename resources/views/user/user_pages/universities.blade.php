@extends('user.layout.master')
@section('title', 'الجامعات ')
@section('content')
    <!-- محتوى صفحة الجامعات -->
    <main class="universities-page">
        <!-- Hero Section - Improved -->
        <div class="hero-section bg-primary py-5 position-relative overflow-hidden">
            <!-- Wave Shape at Bottom -->
            <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="transform: rotate(180deg);">
                <svg preserveAspectRatio="none" style="height: 150px;" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,
                    206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#fff"></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,
                    165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,
                    31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#fff"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#fff"></path>
                </svg>
            </div>

            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center text-white">
                        <h1 class="display-4 fw-bold mb-4">الجامعات اليمنية</h1>
                        <p class="lead mb-5">اكتشف مؤسسات التعليم العالي في الجمهورية اليمنية</p>

                        <!-- Search Box -->
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="input-group shadow-lg rounded-pill overflow-hidden">
                                    <input type="text" class="form-control form-control-lg border-0 py-3 px-4" placeholder="ابحث عن جامعة..." aria-label="Search universities">
                                    <button class="btn btn-light px-4" type="button">
                                        <i class="fas fa-search fs-5 text-primary"></i>
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- باقي المحتوى كما هو -->
        <div class="container py-5">
            <!-- عوامل التصفية -->
            <div class="filters mb-5">
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('user.universities') }}"
                        class="btn btn-outline-primary {{ request()->routeIs('user.universities') ? 'active' : '' }} ">الكل</a>
                    <a href="{{ route('governmentUniversities') }}"
                        class="btn btn-outline-primary {{ request()->routeIs('governmentUniversities') ? 'active' : '' }}">حكومية</a>
                    <a href="{{ route('privateUniversities') }}"
                        class="btn btn-outline-primary {{ request()->routeIs('privateUniversities') ? 'active' : '' }}">خاصة</a>
                    <button class="btn btn-outline-primary">شمال اليمن</button>
                    <button class="btn btn-outline-primary">جنوب اليمن</button>
                </div>
            </div>

            <!-- قائمة الجامعات -->
            <div class="row g-4">
                @if (request()->routeIs('user.universities'))
                    @if ($universities->count() > 0)
                        @foreach ($universities as $university)
                            <div class="col-lg-3 col-md-3 mb-4">
                                <div class="university-card card h-100 border-0" style="max-width: 280px;">
                                    <!-- Header with shaped image -->
                                    <div class="card-img-container position-relative">
                                        <img src="{{ $university->university_logo }}"
                                            alt=" {{ $university->university_name }}" class="university-logo">
                                        <div class="shape-overlay"></div>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body pt-4 px-3 pb-2">
                                        <h5 class="card-title fw-bold text-center mb-3">{{ $university->university_name }}
                                        </h5>

                                        <ul class="list-unstyled small mb-0">
                                            <li class="mb-2">
                                                <i class="fas fa-graduation-cap text-primary me-2"></i>
                                                {{ $university->colleges->count() }} كلية
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                {{ $university->university_location }}
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Footer -->
                                    <div class="card-footer bg-white text-center py-2 border-0">
                                        <x-link href="{{ route('user.colleges_by_university', $university->id) }}"
                                            icon="fas fa-eye" text="تصفح الكليات" class="btn btn-sm btn-primary px-3" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                لا توجد جامعات متاحة في الوقت الحالي.
                            </div>
                        </div>
                    @endif
                @elseif (request()->routeIs('governmentUniversities'))
                    @if ($governmentUniversities->count() > 0)
                        @foreach ($governmentUniversities as $university)
                            <div class="col-lg-3 col-md-3 mb-4">
                                <div class="university-card card h-100 border-0" style="max-width: 280px;">
                                    <!-- Header with shaped image -->
                                    <div class="card-img-container position-relative">
                                        <img src="{{ $university->university_logo }}"
                                            alt=" {{ $university->university_name }}" class="university-logo">
                                        <div class="shape-overlay"></div>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body pt-4 px-3 pb-2">
                                        <h5 class="card-title fw-bold text-center mb-3">{{ $university->university_name }}
                                        </h5>
                                        <ul class="list-unstyled small mb-0">
                                            <li class="mb-2">
                                                <i class="fas fa-graduation-cap text-primary me-2"></i>
                                                {{ $university->colleges->count() }} كلية
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                {{ $university->university_location }}
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Footer -->
                                    <div class="card-footer bg-white text-center py-2 border-0">
                                        <x-link href="{{ route('user.colleges_by_university', $university->id) }}"
                                            icon="fas fa-eye" text="تصفح الكليات" class="btn btn-sm btn-primary px-3" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                لا توجد جامعات حكومية متاحة في الوقت الحالي.
                            </div>
                        </div>
                    @endif
                @elseif (request()->routeIs('privateUniversities'))
                    @if ($privateUniversities->count() > 0)
                        @foreach ($privateUniversities as $university)
                            <div class="col-lg-3 col-md-3 mb-4">
                                <div class="university-card card h-100 border-0" style="max-width: 280px;">
                                    <!-- Header with shaped image -->
                                    <div class="card-img-container position-relative">
                                        <img src="{{ $university->university_logo }}"
                                            alt=" {{ $university->university_name }}" class="university-logo">
                                        <div class="shape-overlay"></div>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body pt-4 px-3 pb-2">
                                        <h5 class="card-title fw-bold text-center mb-3">{{ $university->university_name }}
                                        </h5>
                                        <ul class="list-unstyled small mb-0">
                                            <li class="mb-2">
                                                <i class="fas fa-graduation-cap text-primary me-2"></i>
                                                {{ $university->colleges->count() }} كلية
                                            </li>
                                            <li class="mb-2">
                                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                {{ $university->university_location }}
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Footer -->
                                    <div class="card-footer bg-white text-center py-2 border-0">
                                        <x-link href="{{ route('user.colleges_by_university', $university->id) }}"
                                            icon="fas fa-eye" text="تصفح الكليات" class="btn btn-sm btn-primary px-3" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                لا توجد جامعات خاصة متاحة في الوقت الحالي.
                            </div>
                        </div>
                    @endif
                @else
                    <div class="col-12">
                        <div class="alert alert-warning text-center" role="alert">
                            يرجى اختيار نوع الجامعة من القائمة أعلاه.
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection

<style>
    /* تحسينات بسيطة للهيرو فقط */
    .hero-section {
        background: linear-gradient(135deg, #401d79, #2e073d00);
        padding-bottom: 100px;
        margin-bottom: 30px;
    }

    .hero-section .form-control {
        border-radius: 0 !important;
    }

    .hero-section .input-group {
        border-radius: 50px !important;
    }

    .hero-section .btn-light {
        border-radius: 0 50px 50px 0 !important;
    }
</style>
