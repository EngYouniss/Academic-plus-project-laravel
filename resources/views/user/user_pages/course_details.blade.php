@extends('user.layout.master')
@section('title', 'تفاصيل المادة الدراسية')

@section('content')
<div class="container mt-5 mb-5">
    <div class="text-center mb-4">
        <h2>مادة: برمجة 1</h2>
        <p class="text-muted">اختر القسم الذي ترغب بالدخول إليه</p>
    </div>

    <div class="row g-4">
        <!-- المراجع -->
        <div class="col-md-6 col-lg-3">
            <a href="#" class="section-link">
                <div class="section-card text-center p-4 bg-white shadow rounded-4">
                    <i class="fas fa-book-open fs-1 text-primary mb-3"></i>
                    <div class="fw-bold">📘 المراجع</div>
                </div>
            </a>
        </div>

        <!-- الكورسات -->
        <div class="col-md-6 col-lg-3">
            <a href="#" class="section-link">
                <div class="section-card text-center p-4 bg-white shadow rounded-4">
                    <i class="fas fa-video fs-1 text-primary mb-3"></i>
                    <div class="fw-bold">🎥 الكورسات</div>
                </div>
            </a>
        </div>

        <!-- الملخصات -->
        <div class="col-md-6 col-lg-3">
            <a href="#" class="section-link">
                <div class="section-card text-center p-4 bg-white shadow rounded-4">
                    <i class="fas fa-file-alt fs-1 text-primary mb-3"></i>
                    <div class="fw-bold">📄 الملخصات</div>
                </div>
            </a>
        </div>

        <!-- الاختبارات -->
        <div class="col-md-6 col-lg-3">
            <a href="#" class="section-link">
                <div class="section-card text-center p-4 bg-white shadow rounded-4">
                    <i class="fas fa-pencil-alt fs-1 text-primary mb-3"></i>
                    <div class="fw-bold">📝 الاختبارات</div>
                </div>
            </a>
        </div>
    </div>
</div>

{{-- يمكن تضمين CSS داخلي أو في ملف خارجي --}}
<style>
    .section-link {
        text-decoration: none;
        color: inherit;
    }
    .section-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease-in-out;
    }
</style>
@endsection
