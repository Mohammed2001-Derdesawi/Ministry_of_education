<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'تسجيل مشرف'])
<body>

  <div class="container">

    @include('Layouts.header')

  <form action="{{route('office.supervisor.create')}}" method="POST" class="main-form admin-school">
   @csrf
    <h2>يرجى إدخال البيانات المطلوبة</h2>
    <div class="details">
      <label for="">اسم المشرف</label>
    <input type="text" name="name" value="{{old('name')}}" placeholder="اسم المشرف">
    <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("name")}}

    </span>
    </div>


    <div class="details">
      <label for="">السجل المدني </label>
      <input type="text" name="civil" value="{{old('civil')}}">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("civil")}}

    </span>
    </div>


    <div class="levels details">
        <label for="level">الجنس</label>
        <select name="gender">
            <option value="male">ذكر</option>
            <option value="female">أنثى</option>
        </select>
        <span class="text-danger" style="padding: 10px 0;">
            {{$errors->first("gender")}}

        </span>
      </div>


      <div class="levels details">
        <label for="level">التخصص الإشرافي  </label>
         <select name="specilization">
            @foreach ($specializations as $specialization)
            <option value="{{$specialization->id}}">{{$specialization->specialization}}</option>

            @endforeach

         </select>
         <span class="text-danger" style="padding: 10px 0;">
            {{$errors->first("specilization")}}

        </span>


      </div>








    <input type="submit" value="حفظ">

</form>
</div>









   @include('Layouts.scripts')

</body>
</html>
