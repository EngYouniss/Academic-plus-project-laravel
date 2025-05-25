@extends('user.layout.master')

@section('title', 'المواد الدراسية')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        /* التصميم الأسطوري للعنوان */
        .hero-header {
            position: relative;
            text-align: center;
            padding: 5rem 0;
            margin-bottom: 3rem;
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            color: white;
            overflow: hidden;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 10px 30px rgba(110, 72, 170, 0.3);
        }

        .hero-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(255,255,255,0.1) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(255,255,255,0.1) 0%, transparent 40%);
        }

        .hero-header h1 {
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
            position: relative;
            animation: fadeInDown 0.8s ease;
        }

        .hero-header p {
            font-size: 1.3rem;
            max-width: 600px;
            margin: 0 auto;
            opacity: 0.9;
            position: relative;
            animation: fadeInUp 0.8s ease 0.2s forwards;
            opacity: 0;
        }

        .floating-icons {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .floating-icons i {
            position: absolute;
            color: rgba(255,255,255,0.15);
            animation: float 6s infinite ease-in-out;
        }

        /* تصميم كروت المواد */
        .courses-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .course-card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: white;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(110, 72, 170, 0.2);
        }

        .course-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            transition: all 0.3s ease;
            transform: scaleX(0);
        }

        .course-card:hover::after {
            transform: scaleX(1);
        }

        .course-card-body {
            padding: 25px;
        }

        .course-icon {
            font-size: 28px;
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-left: 15px;
        }

        .course-title {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 1.2rem;
        }

        .course-code {
            background: #f8f0ff;
            color: #6e48aa;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
        }

        /* حالة عدم وجود مواد */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: #f8f9fa;
            border-radius: 12px;
            margin-top: 30px;
            grid-column: 1 / -1;
        }

        .empty-state i {
            font-size: 60px;
            color: #bdc3c7;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #6e48aa 0%, #9d50bb 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .empty-state h4 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .empty-state p {
            color: #7f8c8d;
            font-size: 1.1rem;
            max-width: 500px;
            margin: 0 auto;
        }

        /* التأثيرات الحركية */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* التكيف مع الأجهزة المحمولة */
        @media (max-width: 768px) {
            .hero-header {
                padding: 3rem 1rem;
            }

            .hero-header h1 {
                font-size: 2rem;
            }

            .hero-header p {
                font-size: 1.1rem;
            }

            .courses-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- العنوان الأسطوري -->
    <div class="hero-header">
        <div class="floating-icons">
            <i class="fas fa-book" style="top:20%; left:10%; font-size:2rem; animation-delay:0s"></i>
            <i class="fas fa-pen" style="top:70%; left:80%; font-size:1.5rem; animation-delay:1s"></i>
            <i class="fas fa-graduation-cap" style="top:40%; left:85%; font-size:2.5rem; animation-delay:0.5s"></i>
            <i class="fas fa-atom" style="top:80%; left:15%; font-size:2rem; animation-delay:1.5s"></i>
        </div>

        <h1>المواد الدراسية</h1>
        <p>اختر المادة التي تريد استكشاف محتواها التعليمي</p>
    </div>

    <!-- محتوى الصفحة -->
    <div class="courses-container">
        @if ($courses->count() > 0)
            <div class="courses-grid">
                @foreach ($courses as $course)
                    <a href="{{route('course_details',$course->id)}}" class="text-decoration-none">
                        <div class="course-card">
                            <div class="course-card-body">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-book-open course-icon"></i>
                                    <div>
                                        <h5 class="course-title">{{ $course->course_name }}</h5>
                                        <span class="course-code">{{ $course->course_code }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <h4>لا توجد مواد دراسية متاحة</h4>
                <p>لم يتم إضافة أي مواد دراسية لهذا القسم بعد</p>
            </div>
        @endif
    </div>
@endsection
