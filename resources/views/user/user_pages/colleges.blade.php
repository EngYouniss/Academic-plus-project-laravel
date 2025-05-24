@extends('user.layout.master')
@section('title', 'الكليات ')
@section('content')
    <hr>
    <div class="page-header text-center mb-5">
        <h1 class="display-5 fw-bold"> {{ $university->university_name }} </h1>
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
    <div class="row g-4  ms-2">
        <hr>
        @foreach ($colleges as $college)
            <div class="col-lg-3 col-md-3 mb-4">
                <div class="university-card card h-100 border-0" style="max-width: 280px;">
                    <!-- Header with shaped image -->
                    <div class="card-img-container position-relative">
                        <img src="{{ $college->college_logo }}" alt=" شعار {{ $college->college_name }} "
                            class="university-logo">
                        <div class="shape-overlay"></div>
                    </div>

                    <!-- Card body -->
                    <div class="card-body pt-4 px-3 pb-2">
                        <h5 class="card-title fw-bold text-center mb-3">{{ $college->college_name }}</h5>

                        <ul class="list-unstyled small mb-0">
                            {{-- <li class="mb-2">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            صنعاء، اليمن
                        </li> --}}
                            <li class="mb-2">
                                <i class="fas fa-graduation-cap text-primary me-2"></i>
                                {{ $college->department->count() }} أقسام
                            </li>
                            <li>
                                <i class="fas fa-book text-primary me-2"></i>
                                @if ($college->course && $college->course->count() > 0)
                                    {{ $college->course->count() }} مواد
                                @else
                                    لا توجد مواد
                                @endif

                            </li>
                        </ul>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-white text-center py-2 border-0">
                        <x-link href="{{ route('user.departments',$college->id) }}" icon="fas fa-eye" text="تصفح الاقسام"
                            class="btn btn-sm btn-primary px-3" />
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
