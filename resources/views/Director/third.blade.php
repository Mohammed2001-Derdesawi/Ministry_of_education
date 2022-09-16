@extends('Director.master')
@section('content')
@if (Session::has('warning'))


<div class="alert alert-warning" role="alert">
    {{Session::get('warning')}}
</div>
@endif
  <form action="{{route('director.school.thirdcreate')}}" method="POST" class="main-form admin-school">
@csrf
    <h2>يرجى إدخال البيانات المطلوبة</h2>





    <div class="details">
      <label for="">عدد الموجهين الطلابيين الكلي</label>
      <input name="mentors" type="text" value="{{old('mentors')}}">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("mentors")}}

    </span>
    </div>
    <div class="details">
      <label for="">عدد رواد النشاط </label>
      <input name="activity_pioneers" type="text" value="{{old("activity_pioneers")}}">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("activity_pioneers")}}

    </span>
    </div>
    <div class="details">
      <label for="">عدد  الإداريين </label>
      <input name="admins" type="text" value="{{old("admins")}}">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("admins")}}

    </span>
    </div>
    <div class="details">
      <label for="">عدد  محضري المختبرات </label>
      <input name="exam_preparers" type="text" value="{{old('exam_preparers')}}">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("exam_preparers")}}

    </span>
    </div>
    <div class="details">
      <label for="">عدد  محضري معامل الحاسب </label>
      <input name="computer_laboratories" type="text" value="{{old("computer_laboratories")}}">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("computer_laboratories")}}

    </span>
    </div>


    <input type="submit" value="حفظ">

</form>
@endsection
