

@extends('Director.master')
@section('content')
@if (Session::has('warning'))

<div class="alert alert-warning" role="alert">
    {{Session::get('warning')}}
</div>


@endif
  <form action="{{route('director.school.firstcreate')}}" class="main-form admin-school" method="POST">
    @csrf
    <h2>يرجى إدخال البيانات المطلوبة</h2>
    <div class="details">
      <label for="">اسم المدير</label>
    <input type="text" placeholder="اسم المدير" name="director">
    <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("director")}}

    </span>
    </div>
    <div class="details">
      <label for="">اسم المدرسة</label>
      <input type="text" placeholder="اسم المدرسة" name="name">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("name")}}

    </span>
    </div>
    <div class="details">
      <label for="">الرقم الوزاري </label>
      <input type="text" name="ministerial_number" placeholders="الرقم الوزاري">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("ministerial_number")}}

    </span>
    </div>

    <div class="gender">
      <span>القطاع</span><br>
      <div class="selection">
        <input type="radio" id="male" name="gender" value="male">
          <label for="male">بنين</label>
        <input type="radio" id="female" name="gender" value="female">
          <label for="female">بنات</label>
      </div>
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("gender")}}

    </span>
    </div>

    <div class="levels details">
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


      <div class="levels details">
        <label for="level">نوع المدرسة </label>
        <select name="school_rating" id="">
            @foreach ($schoolratings as $level)
            <option value="{{$level->id}}">{{$level->name}}</option>
            @endforeach


        </select>
        <span class="text-danger" style="padding: 10px 0;">
            {{$errors->first("school_rating")}}

        </span>

      </div>







    <input type="submit" value="التالي">

</form>
@endsection
