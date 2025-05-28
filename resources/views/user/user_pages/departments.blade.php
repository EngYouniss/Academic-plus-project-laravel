@extends('user.layout.master')

@section('title', 'البحث عن المواد الدراسية')

@section('content')
    <hr>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />

    <div class="container text-center mt-5 mb-5" style="max-width: 720px;">
        <h2 class="fw-bold mb-3">ابحث عن مواردك التعليمية</h2>
        <p class="text-muted mb-4">اختر تخصصك ومستواك الدراسي والفصل للوصول إلى المواد والكورسات والمراجع بسهولة.</p>

        <form action="{{route('user.department_details')}}" method="POST" autocomplete="off" novalidate>
            @csrf
            <div class="row g-4">

                <!-- اختيار التخصص -->
                <div class="col-12 col-md-4">
                    <label for="faculty" class="form-label fw-semibold">اختر التخصص</label>
                    <select id="faculty" name="department" class="form-select form-select-lg rounded-pill" required>

                        <option value="" disabled selected>اختر القسم</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>)

                        @endforeach

                    </select>
                </div>

                <!-- اختيار المستوى -->
                <div class="col-12 col-md-4">
                    <label for="level" class="form-label fw-semibold">اختر المستوى</label>
                    <select id="level" name="level" class="form-select form-select-lg rounded-pill" required>
                        <option value="" disabled selected>اختر المستوى</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}">{{ $level->level_name }}</option>

                        @endforeach

                    </select>
                </div>

                <!-- اختيار الفصل الدراسي -->
                <div class="col-12 col-md-4">
                    <label for="semester" class="form-label fw-semibold">اختر الفصل الدراسي</label>
                    <select id="semester" name="semester" class="form-select form-select-lg rounded-pill" required>
                        <option value="" disabled selected>اختر الفصل</option>
                            @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>)

                            @endforeach
                    </select>
                </div>

                <!-- زر البحث -->
                <div class="col-12 text-center mt-4">
                    <input type="submit" class="btn btn-outline-primary px-4" value="عرض المواد">

                </div>

            </div>
        </form>
    </div>

    <!-- أيقونات FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
