@extends('user.layout.master')

@section('title', 'المواد الدراسية')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <style>
        .subject-card {
            border: none;
            border-radius: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .subject-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .subject-icon {
            font-size: 2.5rem;
            color: #0d6efd;
        }
    </style>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">المواد الدراسية المتوفرة</h2>
            <p class="text-muted">اختر المادة التي ترغب في تصفح مواردها</p>
        </div>

        <div class="row g-4">
            @if ($courses->count() > 0)
               @foreach ($courses as $course)
                <div class="col-md-6 col-lg-4">
                    <a href="{{route('course_details',$course->id)}}" class="text-decoration-none">
                        <div class="card subject-card p-4 h-100 shadow-sm">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fas fa-book subject-icon"></i>
                                <div>
                                    <h5 class="mb-1 text-dark"> {{ $course->course_name }}</h5>
                                    <small class="text-muted">{{ $course->course_code }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
                @else
                <div class="jumbotron text-center">
                    <h1 class="display-6">لا توجد مواد دراسية</h1>
                    <p class="lead">لم يتم العثور على أي مواد دراسية لهذا القسم.</p>
                    </div>
            @endif

        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
