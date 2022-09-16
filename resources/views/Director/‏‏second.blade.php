@extends('Director.master')
@section('content')
@if (Session::has('warning'))

<div class="alert alert-warning" role="alert">
    {{Session::get('warning')}}
</div>


@endif
  <form action="{{route('director.school.secondcreate')}}" method="POST" class="main-form admin-school">
@csrf
    <h2>يرجى إدخال البيانات المطلوبة</h2>



    <div class="levels details">
      <label for="level">حدد المرحلة</label>
      <select name="level" id="">

        <option value="children">رياض أطفال</option>
        <option value="secondary"> ابتدائي</option>
        <option value="medium"> متوسط</option>
        <option value="primary"> ثانوي</option>
      </select>
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("level")}}

    </span>
    </div>

    <div class="levels details">
      <label for="building">نوع المبنى </label>
      <select name="building" id="">

        <option value="state">حكومي </option>
        <option value="tenant"> مستأجر</option>
        <option value="loaned"> معار</option>
      </select>
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("building")}}

    </span>
    </div>
    <div class="levels details">
      <label for="level"> فترة العمل </label>
      <select name="time" id="">
        <option value="night">مسائي </option>
        <option value="morning" selected> صباحي</option>

      </select>
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("time")}}

    </span>
    </div>


    <div class="details">
      <label for="">عدد الطلاب الكلي </label>
      <input type="text" value="" name="students">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("students")}}

    </span>
    </div>
    <div class="details">
      <label for="">عدد المعلمين الكلي</label>
      <input type="text" value="" name="teachers">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("teachers")}}

    </span>
    </div>

    <div class="details">
      <label for="">عدد الوكلاء الكلي</label>
      <input type="text" value="" name="agents">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("agents")}}

    </span>
    </div>



    <input type="submit" value="التالي">

</form>
@endsection
