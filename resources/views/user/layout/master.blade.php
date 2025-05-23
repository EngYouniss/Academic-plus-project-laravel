<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduYemen - المنصة التعليمية اليمنية</title>
  <!-- Bootstrap RTL -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <!-- Tajawal Arabic Font -->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- CSS المخصص -->
  <link rel="stylesheet" href="{{asset('user/style/styles.css')}}">
  <style>
    .hero-section {
      background: linear-gradient(135deg, rgb(68, 112, 65), rgba(203, 191, 190, 0.861)),
                  url('../images/yemen-heritage.jpg');
      background-size: cover;
      background-attachment: fixed;
      position: relative;
      overflow: hidden;
    }

    .floating-shapes:before {
      content: '';
      position: absolute;
      width: 400px;
      height: 400px;
      background: rgba(255,255,255,0.1);
      border-radius: 50%;
      top: -100px;
      left: -100px;
      animation: float 20s infinite linear;
    }

    @keyframes float {
      0% { transform: translate(0,0) rotate(0deg); }
      50% { transform: translate(200px,150px) rotate(180deg); }
      100% { transform: translate(0,0) rotate(360deg); }
    }
  </style>

</head>
<body>
  <!-- شريط التنقل المحسن -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary-gradient shadow-lg">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="images/logo-3d.png" alt="EduYemen" width="60" class="logo-3d">
        <span class="brand-text">EduYemen</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
  <a class="nav-link {{ request()->routeIs('user.home') ? 'active' : '' }}" href="{{ route('user.home') }}">
    <i class="fas fa-home me-1"></i> الرئيسية
  </a>
</li>
          <li class="nav-item">
            <a class="nav-link {{request()->routeIs('user.universities')?'active':''}}" href="{{route('user.universities')}}"><i class="fas fa-university me-1"></i> الجامعات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-book me-1"></i> المواد</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-info-circle me-1"></i> عن المنصة</a>
          </li>
        </ul>
        <div class="d-flex">
          <a class="btn btn-login" href="./docs/login.html">
            <i class="fas fa-sign-in-alt me-1"></i> تسجيل الدخول
          </a>
        </div>
      </div>
    </div>
  </nav>
  <body>
    @yield('content')
  </body>
 <!-- تذييل الصفحة المحسن -->
  <footer class="bg-dark text-white pt-5 pb-4 text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <h5 class="fw-bold mb-4">EduYemen</h5>
          <p>أول منصة تعليمية شاملة للطلاب الجامعيين في اليمن، تهدف إلى تسهيل الوصول للموارد التعليمية.</p>
          <div class="social-icons mt-4">
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 mb-4">
          <h5 class="fw-bold mb-4">روابط سريعة</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-white-50">الرئيسية</a></li>
            <li class="mb-2"><a href="#" class="text-white-50">الجامعات</a></li>
            <li class="mb-2"><a href="#" class="text-white-50">المواد</a></li>
            <li class="mb-2"><a href="#" class="text-white-50">عن المنصة</a></li>
            <li><a href="#" class="text-white-50">اتصل بنا</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="fw-bold mb-4">الجامعات</h5>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-white-50">جامعة صنعاء</a></li>
            <li class="mb-2"><a href="#" class="text-white-50">جامعة عدن</a></li>
            <li class="mb-2"><a href="#" class="text-white-50">جامعة تعز</a></li>
            <li class="mb-2"><a href="#" class="text-white-50">جامعة إب</a></li>
            <li><a href="#" class="text-white-50">المزيد...</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <h5 class="fw-bold mb-4">النشرة البريدية</h5>
          <p>اشترك ليصلك كل جديد عن المنصة والمواد المضافة</p>
          <form class="mt-3">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="بريدك الإلكتروني">
              <button class="btn btn-primary" type="submit">اشتراك</button>
            </div>
          </form>
        </div>
      </div>
      <hr class="my-4">
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          <p class="mb-0">&copy; 2024 EduYemen. جميع الحقوق محفوظة.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="#" class="text-white-50">سياسة الخصوصية</a></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">شروط الاستخدام</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- يمكنك إضافة ملف JavaScript المخصص هنا -->
   <script src="https://unpkg.com/scrollreveal"></script>
<script>
  ScrollReveal().reveal('.card', {
    delay: 200,
    distance: '20px',
    origin: 'bottom',
    interval: 100
  });
</script>
</body>
</html>
