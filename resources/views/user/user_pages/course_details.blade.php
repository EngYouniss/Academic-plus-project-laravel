@extends('user.layout.master')
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

<style>
    /* التصميم الأسطوري */
    :root {
        --primary: #6e48aa;
        --secondary: #9d50bb;
        --accent: #4776E6;
        --dark: #2c3e50;
        --light: #f8f9fa;
        --text: #4a4a4a;
    }

    .legendary-course-page {
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        padding-bottom: 50px;
    }

    /* Hero Section */
    .course-hero {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        padding: 5rem 1rem;
        text-align: center;
        position: relative;
        border-radius: 0 0 30px 30px;
        margin-bottom: 3rem;
        box-shadow: 0 10px 30px rgba(110, 72, 170, 0.4);
    }

    .hero-pattern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 20px 20px;
        opacity: 0.3;
    }

    .course-badge {
        background: rgba(255,255,255,0.2);
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 1rem;
        display: inline-block;
        margin-bottom: 1rem;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255,255,255,0.1);
    }

    .course-title {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .course-description {
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
        opacity: 0.9;
    }

    /* Sections Grid */
    .sections-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .section-card {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        text-decoration: none;
        color: var(--text);
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        border: 1px solid rgba(0,0,0,0.03);
    }

    .card-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 1.5rem;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: white;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        box-shadow: 0 5px 15px rgba(110, 72, 170, 0.3);
        transition: all 0.3s ease;
    }

    .section-card h3 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: var(--dark);
        font-weight: 700;
    }

    .section-card p {
        color: var(--text);
        opacity: 0.8;
        font-size: 0.95rem;
    }

    .card-hover-effect {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(110,72,170,0.1), rgba(157,80,187,0.1));
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }

    .card-badge {
        position: absolute;
        top: -15px;
        right: -15px;
        background: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    /* Hover Effects */
    .section-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 30px rgba(110, 72, 170, 0.2);
    }

    .section-card:hover .card-icon {
        transform: rotate(10deg) scale(1.1);
        box-shadow: 0 10px 20px rgba(110, 72, 170, 0.4);
    }

    .section-card:hover .card-hover-effect {
        opacity: 1;
    }

    .section-card:hover .card-badge {
        transform: scale(1.1) rotate(15deg);
    }

    /* Floating Elements */
    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .floating-icon {
        position: absolute;
        color: rgba(110,72,170,0.05);
        font-size: 5rem;
        animation: float 15s infinite linear;
    }

    .floating-icon:nth-child(1) {
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .floating-icon:nth-child(2) {
        top: 60%;
        left: 80%;
        animation-delay: 3s;
    }

    .floating-icon:nth-child(3) {
        top: 40%;
        left: 15%;
        animation-delay: 6s;
    }

    @keyframes float {
        0% {
            transform: translateY(0) rotate(0deg);
        }
        50% {
            transform: translateY(-50px) rotate(10deg);
        }
        100% {
            transform: translateY(0) rotate(0deg);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .course-title {
            font-size: 2rem;
        }

        .course-description {
            font-size: 1rem;
        }

        .sections-grid {
            grid-template-columns: 1fr;
            max-width: 400px;
        }

        .section-card {
            padding: 1.5rem;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
    }
</style>
@endsection
