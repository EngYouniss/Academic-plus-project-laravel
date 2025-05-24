@extends('user.layout.master')
@section('title', 'الجامعات ')
@section('content')
    <!-- محتوى صفحة الجامعات -->
    <main class="universities-page py-5">
        <div class="container">
            <div class="page-header text-center mb-5">
                <h1 class="display-5 fw-bold">الجامعات اليمنية</h1>
                <div class="d-flex justify-content-center mt-4">
                    <div class="w-50">
                        <div class="input-group shadow-sm rounded-pill">
                            <input type="text" class="form-control border-0 py-2" placeholder="ابحث عن جامعة...">
                            <button class="btn btn-primary px-4">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- عوامل التصفية -->
            <div class="filters mb-5">
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <button class="btn btn-outline-primary active">الكل</button>
                    <button class="btn btn-outline-primary">حكومية</button>
                    <button class="btn btn-outline-primary">خاصة</button>
                    <button class="btn btn-outline-primary">شمال اليمن</button>
                    <button class="btn btn-outline-primary">جنوب اليمن</button>
                </div>
            </div>

            <!-- قائمة الجامعات -->
            <div class="row g-4  ">
                <!-- جامعة صنعاء -->
                {{-- <div class="col-lg-3 col-md-6 mb-4">
                    <div class="university-card card h-100 border-0" style="max-width: 280px;">
                        <!-- Header with shaped image -->
                        <div class="card-img-container position-relative">
                            <img src="{{ asset('user/asset/images/Sanaa_University_Logo.jpg') }}" alt="جامعة صنعاء"
                                class="university-logo">
                            <div class="shape-overlay"></div>
                        </div>

                        <!-- Card body -->
                        <div class="card-body pt-4 px-3 pb-2">
                            <h5 class="card-title fw-bold text-center mb-3">جامعة صنعاء</h5>

                            <ul class="list-unstyled small mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    صنعاء، اليمن
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-graduation-cap text-primary me-2"></i>
                                    24 كلية
                                </li>
                                <li>
                                    <i class="fas fa-book text-primary me-2"></i>
                                    500+ مادة دراسية
                                </li>
                            </ul>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer bg-white text-center py-2 border-0">
                            <x-link href="{{route('user.faculities')}}" icon="fas fa-eye" text="تصفح الكليات"
                                class="btn btn-sm btn-primary px-3" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="university-card card h-100 border-0" style="max-width: 280px;">
                        <!-- Header with shaped image -->
                        <div class="card-img-container position-relative">
                            <img src="{{ asset('user/asset/images/Sanaa_University_Logo.jpg') }}" alt="جامعة صنعاء"
                                class="university-logo">
                            <div class="shape-overlay"></div>
                        </div>

                        <!-- Card body -->
                        <div class="card-body pt-4 px-3 pb-2">
                            <h5 class="card-title fw-bold text-center mb-3">جامعة صنعاء</h5>

                            <ul class="list-unstyled small mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    صنعاء، اليمن
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-graduation-cap text-primary me-2"></i>
                                    24 كلية
                                </li>
                                <li>
                                    <i class="fas fa-book text-primary me-2"></i>
                                    500+ مادة دراسية
                                </li>
                            </ul>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer bg-white text-center py-2 border-0">
                            <x-link href="{{route('user.faculities')}}" icon="fas fa-eye" text="تصفح الكليات"
                                 />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="university-card card h-100 border-0" style="max-width: 280px;">
                        <!-- Header with shaped image -->
                        <div class="card-img-container position-relative">
                            <img src="{{ asset('user/asset/images/Sanaa_University_Logo.jpg') }}" alt="جامعة صنعاء"
                                class="university-logo">
                            <div class="shape-overlay"></div>
                        </div>

                        <!-- Card body -->
                        <div class="card-body pt-4 px-3 pb-2">
                            <h5 class="card-title fw-bold text-center mb-3">جامعة صنعاء</h5>

                            <ul class="list-unstyled small mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    صنعاء، اليمن
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-graduation-cap text-primary me-2"></i>
                                    24 كلية
                                </li>
                                <li>
                                    <i class="fas fa-book text-primary me-2"></i>
                                    500+ مادة دراسية
                                </li>
                            </ul>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer bg-white text-center py-2 border-0">
                            <x-link href="{{route('user.faculities')}}" icon="fas fa-eye" text="تصفح الكليات"
                                class="btn btn-sm btn-primary px-3" />
                        </div>
                    </div>
                </div> --}}
                @foreach ($universities as $university)
                    <div class="col-lg-3 col-md-3 mb-4">
                        <div class="university-card card h-100 border-0" style="max-width: 280px;">
                            <!-- Header with shaped image -->
                            <div class="card-img-container position-relative">
                                <img src="{{ $university->university_logo }}" alt="جامعة صنعاء" class="university-logo">
                                <div class="shape-overlay"></div>
                            </div>

                            <!-- Card body -->
                            <div class="card-body pt-4 px-3 pb-2">
                                <h5 class="card-title fw-bold text-center mb-3">{{ $university->university_name }}</h5>

                                <ul class="list-unstyled small mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                        صنعاء، اليمن
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-graduation-cap text-primary me-2"></i>
                                        24 كلية
                                    </li>
                                    <li>
                                        <i class="fas fa-book text-primary me-2"></i>
                                        500+ مادة دراسية
                                    </li>
                                </ul>
                            </div>

                            <!-- Footer -->
                            <div class="card-footer bg-white text-center py-2 border-0">
                                <x-link href="{{ route('user.university',$university->id) }}" icon="fas fa-eye" text="تصفح الكليات"
                                    class="btn btn-sm btn-primary px-3" />
                            </div>
                        </div>
                    </div>
                @endforeach


                <!-- يمكن إضافة المزيد من الجامعات بنفس النمط -->
            </div>
        </div>
    </main>
@endsection
