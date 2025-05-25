@extends('user.layout.master')
@section('title', 'مراجع المادة الدراسية')

@section('content')
<div class="legendary-references-page">
    <!-- Hero Section -->
    <div class="references-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">مراجع برمجة 1</h1>
                <p class="hero-description">أفضل الكتب والمراجع العلمية الموصى بها</p>


            </div>
        </div>
        <div class="hero-pattern"></div>
    </div>

    <!-- Filters -->
    <div class="filters-section">
        <div class="container">
            <div class="filters-wrapper">
                <div class="filter-tags">
                    <button class="filter-tag active">الكل</button>
                    <button class="filter-tag">الكتب</button>
                    <button class="filter-tag">الأبحاث</button>
                    <button class="filter-tag">الملخصات</button>
                    <button class="filter-tag">PDF</button>
                </div>

                <div class="sort-dropdown">
                    <select>
                        <option>الأحدث</option>
                        <option>الأقدم</option>
                        <option>الأكثر تحميلاً</option>
                        <option>الأعلى تقييماً</option>
                    </select>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- References Grid -->



</div>

<style>
    /* الأسس العامة */
    :root {
        --primary: #6e48aa;
        --secondary: #9d50bb;
        --accent: #4776E6;
        --dark: #2c3e50;
        --light: #f8f9fa;
       
    }

    .legendary-references-page {
        position: relative;
        overflow: hidden;
        background-color: #f5f7fa;
        padding-bottom: 50px;
    }

    /* الهيدر الأسطوري */
    .references-hero {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        padding: 5rem 0 7rem;
        position: relative;
        text-align: center;
    }


    /* قسم الفلاتر */
    .filters-section {
        background: white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        position: relative;
        z-index: 10;
        margin-top: -30px;
        border-radius: 15px 15px 0 0;
        padding: 1rem 0;
        margin-bottom: 2rem;
    }

    .filters-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .filter-tags {
        display: flex;
        gap: 0.8rem;
        overflow-x: auto;
        padding-bottom: 5px;
    }

    .filter-tag {
        background: var(--light);
        border: none;
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        font-size: 0.9rem;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.3s;
    }

    .filter-tag.active {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
    }

    .sort-dropdown {
        position: relative;
    }

    .sort-dropdown select {
        appearance: none;
        padding: 0.5rem 2rem 0.5rem 1rem;
        border-radius: 50px;
        border: 1px solid #ddd;
        font-size: 0.9rem;
        cursor: pointer;
    }

    .sort-dropdown i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        font-size: 0.8rem;
    }

</style>

<!-- Script for Quick View Modal -->

@endsection
