<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'تسجيل الدخول'])
<body>

  <div class="container-fluid">

    @include('Layouts.header')
    <div class="container">
        @if (Session::has('success'))

        <div class="alert alert-info" role="alert">
           {{Session::get('success')}}
          </div>

        @endif
        @if (Session::has('faild'))

        <div class="alert alert-danger" role="alert">
           {{Session::get('faild')}}
          </div>

        @endif
        @if (Session::has('info'))

        <div class="alert alert-warning" role="alert">
            {{Session::get('info')}}
        </div>


        @endif
      <form action="{{route('login')}}" method="POST" class="main-form">
        @csrf
        <h2>بوابة الدخول  </h2>
        <div class="gender sign-type">

          <div class="selection">
            <input type="radio" id="male" name="type" value="director">
              <label for="male">مدير مدرسة</label>
            <input type="radio" id="female" name="type" value="office">
              <label for="female">مدير مكتب تعليم</label>
            <input type="radio" id="female" name="type" value="administration">
              <label for="female">إدارة تعليمية </label>
          </div>

        </div>
        <input type="text" name="email" placeholder="أدخل اسم المستخدم هنا " class="form-input">
        <span class="text-danger" style="padding: 10px 0;">
            {{$errors->first("email")}}

        </span>


        <input type="password" name="password" placeholder="كلمة المرور" class="form-input">
        <input type="submit" class="form-input" value="دخول">

        <div class="links">
          <a href="{{route('signup')}}" class="signup">تسجيل حساب جديد</a>
        </div>

    </form>
    </div>

  <div class="bg">
    <img src="{{asset('assets/img/bg2.png')}}" alt="">
  </div>

  </div>





   @include('Layouts.scripts')

</body>
</html>
