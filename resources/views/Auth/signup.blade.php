<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'إنشاء حساب'])
<body>

  <div class="container-fluid">

    @include('Layouts.header')
    <div class="container">
      <form action="{{route('signup')}}" class="main-form" method="POST">
        @csrf
        <h2>إنشاء حساب جديد   </h2>
        <div class="gender sign-type">
          <span>التسجيل ك</span><br>
          <span class="text-danger" style="padding: 10px 0;">
            {{$errors->first("type")}}
          </span>
          <div class="selection">
            <input type="radio" selected  onchange="Show_Offices(event)" id="director" name="type" value="director">
              <label for="director">مدير مدرسة</label>
            <input type="radio" onchange="Show_Offices(event)" id="manageroffice" name="type" value="office">
              <label for="manageroffice">مدير مكتب تعليم</label>
            <input type="radio"  onchange="Show_Offices(event)" id="admin" name="type" value="administrations">
              <label for="admin">إدارة تعليمية </label>
          </div>

        </div>

        <input type="text" value="{{old('email')}}" name="email" placeholder="البريد الإلكتورني" class="form-input">
        <span class="text-danger" style="padding-bottom: 10px;">
            {{$errors->first("email")}}

        </span>
        <input type="password" name="password" placeholder="   كلمة المرور  " class="form-input">
        <span class="text-danger" style="padding-bottom: 10px;">
            {{$errors->first("password")}}

        </span>


        <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" class="form-input">
        <div class="levels details" id="office" style="display:none;">
            <label for="level">مكتب التعليم </label>
            <select name="direction" id="">
              @foreach ($directions as $direction)
              <option value="{{$direction->id}}">{{$direction->direction}}</option>
              @endforeach


            </select>
            <span class="text-danger" style="padding: 10px 0;">
              {{$errors->first("direction")}}

          </span>

          </div>


        <input type="submit" class="form-input">

        <a href="{{route('login')}}" class="signup">تسجيل  دخول</a>

    </form>
    </div>

  <div class="bg">
    <img src="{{asset('assets/img/bg2.png')}}" alt="">
  </div>

  </div>





    @include('Layouts.scripts')
    <script>
          function Show_Offices(e)
          {
            var office=document.getElementById('office');

            if(e.target.value=='office')
            {

         office.style.display='';

            }
            else
            office.style.display='none';




          }
        // if(manageroffice)
        // {

        // }
    </script>
</body>

</html>
