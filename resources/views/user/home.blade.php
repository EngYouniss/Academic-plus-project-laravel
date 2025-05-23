@extends('user.layout.master')
@section('title', 'بوابة التعليم اليمني')
@section('content')
  <!-- قسم البطل المحسن -->
   <header class="hero-section text-white">
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
            <input type="text" class="form-control border-0 py-3 px-4" placeholder="أدخل كلمة البحث (مثال: جامعة صنعاء، الفيزياء)">
            <button class="btn btn-primary px-4" type="button">
              <i class="fas fa-search"></i> بحث
            </button>
          </div>
        </div>
      </div>
    </div>
</header>
  <!-- قسم الجامعات المحسن -->
  <section id="universities" class="py-5 bg-light">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h2 class="section-title">الجامعات المشاركة</h2>
        <p class="text-muted">اختر جامعتك للوصول إلى جميع المواد والموارد</p>
      </div>
      <div class="row g-4">
        <!-- جامعة صنعاء -->
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 border-0 shadow-sm hover-effect">
            <div class="card-header bg-white border-0 text-center py-3">
              <img src="{{asset('user/asset/images/Sanaa_University_Logo.jpg')}}" alt="جامعة صنعاء" height="60">
            </div>
            <div class="card-body text-center">
              <h3 class="h5 fw-bold mb-3">جامعة صنعاء</h3>
              <p class="text-muted mb-4">الجامعة الأم في اليمن تحتوي على جميع الكليات والتخصصات</p>
              <div class="d-flex justify-content-center">
                <span class="badge bg-primary me-2">24 كلية</span>
                <span class="badge bg-secondary">500+ مادة</span>
              </div>
            </div>
            <div class="card-footer bg-white border-0 text-center py-3">
              <a href="university.html?id=1" class="btn btn-outline-primary px-4">
                <i class="fas fa-eye me-2"></i> تصفح المواد
              </a>
            </div>
          </div>
        </div>

        <!-- جامعة عدن -->
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 border-0 shadow-sm hover-effect">
            <div class="card-header bg-white border-0 text-center py-3">
              <img src="{{asset('user/asset/images/Aden_University_Logo.jpg')}}" alt="جامعة عدن" height="60">
            </div>
            <div class="card-body text-center">
              <h3 class="h5 fw-bold mb-3">جامعة عدن</h3>
              <p class="text-muted mb-4">ثاني أكبر جامعة يمنية تحتوي على تخصصات متنوعة</p>
              <div class="d-flex justify-content-center">
                <span class="badge bg-primary me-2">18 كلية</span>
                <span class="badge bg-secondary">400+ مادة</span>
              </div>
            </div>
            <div class="card-footer bg-white border-0 text-center py-3">
              <a href="university.html?id=2" class="btn btn-outline-primary px-4">
                <i class="fas fa-eye me-2"></i> تصفح المواد
              </a>
            </div>
          </div>
        </div>

        <!-- جامعة تعز -->
        <div class="col-lg-4 col-md-6">
          <div class="card h-100 border-0 shadow-sm hover-effect">
            <div class="card-header bg-white border-0 text-center py-3">
              <img src="{{asset('user/asset/images/Taizz_University_Logo.jpg')}}" alt="جامعة تعز" height="60">
            </div>
            <div class="card-body text-center">
              <h3 class="h5 fw-bold mb-3">جامعة تعز</h3>
              <p class="text-muted mb-4">من أهم الجامعات في جنوب اليمن بتخصصات علمية وأدبية</p>
              <div class="d-flex justify-content-center">
                <span class="badge bg-primary me-2">15 كلية</span>
                <span class="badge bg-secondary">350+ مادة</span>
              </div>
            </div>
            <div class="card-footer bg-white border-0 text-center py-3">
              <a href="university.html?id=3" class="btn btn-outline-primary px-4">
                <i class="fas fa-eye me-2"></i> تصفح المواد
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <a href="universities.html" class="btn btn-primary px-4 py-2">
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
            <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4" style="width: 70px; height: 70px; line-height: 70px;">
              <i class="fas fa-book-open fa-2x"></i>
            </div>
            <h3 class="h5 fw-bold mb-3">المواد الدراسية</h3>
            <p class="text-muted">آلاف المواد المنهجية من مختلف الجامعات اليمنية</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card p-4 text-center border rounded h-100">
            <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4" style="width: 70px; height: 70px; line-height: 70px;">
              <i class="fas fa-file-pdf fa-2x"></i>
            </div>
            <h3 class="h5 fw-bold mb-3">الملخصات</h3>
            <p class="text-muted">ملخصات ومراجعات معدة من قبل أساتذة ومتميزين</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card p-4 text-center border rounded h-100">
            <div class="icon-wrapper bg-primary bg-opacity-10 text-primary rounded-circle mx-auto mb-4" style="width: 70px; height: 70px; line-height: 70px;">
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
