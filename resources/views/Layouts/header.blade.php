<div class="header">

    @if (Route::is('office.*'))
            <div class="logout">
                <form action="{{route('office.logout')}}" method="post">
                    @csrf
                  <button type="submit" style="background: none;border: 0"><i class="fas fa-sign-out-alt"></i><span>تسجيل الخروج</span></button>
                 </form>
              </div>
    @endif


    @if (Route::is('office.supervisor.create.page') ||Route::is('office.schools'))

    <div class="backto-main">

        <a href="{{route('office.main')}}"><i class="fa fa-arrow-left"></i><span>الرجوع للصفحة الرئيسية</span></a>

    </div>



   @endif


    <div class="logo">
      <img src="{{asset('assets/img/1920px-MOELogo.svg.png')}}" alt="">
    </div>
    <p>المملكة العربية السعودية<br>
      وزارة التعليم<br>
      الإدارة العامة للتعليم بمحافظة جدة<br>
      الشؤون التعليمية
      </p>
  </div>
