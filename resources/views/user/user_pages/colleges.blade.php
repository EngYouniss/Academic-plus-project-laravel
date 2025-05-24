@extends('user.layout.master')
@section('title', 'الكليات ')
@section('content')
<div class="row g-4"> @foreach ($college as $college)
        <div class="col-lg-3 col-md-3 mb-4">
            <div class="university-card card h-100 border-0" style="max-width: 280px;">
                <!-- Header with shaped image -->
                <div class="card-img-container position-relative">
                    <img src="{{ $college->college_logo }}" alt="جامعة صنعاء" class="university-logo">
                    <div class="shape-overlay"></div>
                </div>

                <!-- Card body -->
                <div class="card-body pt-4 px-3 pb-2">
                    <h5 class="card-title fw-bold text-center mb-3">{{ $college->college_name }}</h5>

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
                    <x-link href="{{ route('user.faculities') }}" icon="fas fa-eye" text="تصفح الكليات"
                        class="btn btn-sm btn-primary px-3" />
                </div>
            </div>
        </div>
    @endforeach</div>


@endsection
