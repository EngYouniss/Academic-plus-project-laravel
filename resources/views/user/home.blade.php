@extends('user.layout.master')
@section('title', 'بوابة التعليم اليمني')
@section('content')
    <!-- قسم البطل المحسن -->
    {{-- <header class="hero-section text-white">
        <div class="floating-shapes"></div>
        <div class="container text-center">
            <div class="hero-content">
                <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">
                    <span class="text-highlight">بوابة التعليم</span> اليمني
                </h1>
                <p class="lead fs-4 mb-5 animate__animated animate__fadeInUp">
                    منصة متكاملة تجمع كل ما يحتاجه الطالب الجامعي
                </p>
                <div class="search-container animate__animated animate__zoomIn">
                    <div class="container">
                        <h2 class="text-center mb-4 fw-bold">ابحث عن الموارد التعليمية</h2>
                        <p class="text-center text-muted mb-5">ابحث حسب الجامعة، الكلية، أو المادة الدراسية</p>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="input-group shadow-lg rounded-pill">
                                    <input type="text" class="form-control border-0 py-3 px-4"
                                        placeholder="أدخل كلمة البحث (مثال: جامعة صنعاء، الفيزياء)">
                                    <button class="btn btn-primary px-4" type="button">
                                        <i class="fas fa-search"></i> بحث
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
    </header> --}}
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
                <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInDown">
                    <span class="text-highlight">بوابة التعليم</span> اليمني
                </h1>
                <p class="lead fs-4 mb-5 animate__animated animate__fadeInUp">
                    منصة متكاملة تجمع كل ما يحتاجه الطالب الجامعي
                </p>
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

    <!-- قسم الجامعات المحسن -->
    <section id="universities" class="py-5 bg-light">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">الجامعات المشاركة</h2>
                <p class="text-muted">اختر جامعتك للوصول إلى جميع المواد والموارد</p>
            </div>
            <div class="row g-4">

                @if ($universities->count() > 0)
@foreach ($universities as $university)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm hover-effect">
                            <div class="card-header bg-white border-0 text-center py-3">
                                <img src="{{ asset($university->university_logo) }}" alt="جامعة تعز" height="60">
                            </div>
                            <div class="card-body text-center">
                                <h3 class="h5 fw-bold mb-3">{{ $university->university_name }}</h3>
                                <p class="text-muted mb-4">{{ $university->university_description }}</p>
                                <div class="d-flex justify-content-center">
                                    <span class="badge bg-primary me-2">{{ $university->colleges->count() }} كلية</span>
                                    <span class="badge bg-secondary">350+ مادة</span>
                                </div>
                            </div>
                            <div class="card-footer bg-white border-0 text-center py-3">
                                <a href="{{ route('user.colleges_by_university', $university->id) }}"
                                    class="btn btn-outline-primary px-4">
                                    <i class="fas fa-eye me-2"></i> عرض الكليات
                                </a>
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

            </div>

            <div class="text-center mt-5">
                <a href="{{ route('user.universities') }}" class="btn btn-primary px-4 py-2">
                    <i class="fas fa-university me-2"></i> عرض جميع الجامعات
                </a>
            </div>
        </div>
    </section>

    <!-- قسم المميزات -->
    <section class="features-section py-5 bg-opacity-10">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h2 class="section-title">لماذا تختار EduYemen؟</h2>
                <p class="text-muted">كل ما يحتاجه الطالب الجامعي في مكان واحد</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card p-4 text-center border rounded h-100">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4"
                            style="width: 70px; height: 70px; line-height: 70px;">
                            <i class="fas fa-book-open fa-2x"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">المواد الدراسية</h3>
                        <p class="text-muted">آلاف المواد المنهجية من مختلف الجامعات اليمنية</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card p-4 text-center border rounded h-100">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4"
                            style="width: 70px; height: 70px; line-height: 70px;">
                            <i class="fas fa-file-pdf fa-2x"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">الملخصات</h3>
                        <p class="text-muted">ملخصات ومراجعات معدة من قبل أساتذة ومتميزين</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card p-4 text-center border rounded h-100">
                        <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4"
                            style="width: 70px; height: 70px; line-height: 70px;">
                            <i class="fas fa-chalkboard-teacher fa-2x"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">الدروس</h3>
                        <p class="text-muted">فيديوهات تعليمية لشرح المواد الصعبة</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- تذييل الصفحة المحسن -->
@endsection
