
@php
    $title="الادارة التعليمية|الصفحة الرئيسية";
@endphp
@extends('Administration.master')
 @section('content')

 <div class="stats-impo">
    <h3> الإحصائيات العامة لجميع المكاتب التعليمية</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered allschools">

      <tr>
        <td colspan="2" class="colored colored-type">النوع</td>
        <td>تعليم عام</td>
        <td>تعليم أهلي</td>
        <td> تحفيظ قرءان</td>
        <td>  تربية خاصة</td>
        <td class="colored">  المجموع الكلي لكل قطاع </td>
      </tr>
      <tr>
        <td rowspan="2" class="gender1 colored-type">القطاع</td>
        <td class="gender1">بنين</td>
        @php
        $subtotal=0;
        $total=0;

    @endphp
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_males_count??0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_males_count;

   @endphp
   @endfor

        <td class="total colored1">{{$subtotal}}</td>
      </tr>
      <tr>
        <td class="gender1">بنات</td>
        @php
        $total+=$subtotal;
        $subtotal=0;


    @endphp
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_females_count??0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_females_count;

   @endphp
   @endfor
   @php
       $total+=$subtotal;
   @endphp

        <td class="total colored1" >{{$subtotal}}</td>
      </tr>
      <tr>
        <td colspan="2" class="colored">المجموع الكلي لكل نوع</td>
        @foreach ($school_ratings as $school)
            <td class="colored1">{{$school->schools_females_count+$school->schools_males_count}}</td>
            @endforeach
        <td class="total colored">المجموع الكلي للمدارس ={{$total}} مدرسة</td>
      </tr>

    </table>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered allschools">

      <tr>
        <td colspan="2" class="colored colored-type">النوع</td>
        <td>تعليم عام</td>
        <td>تعليم أهلي</td>
        <td> تحفيظ قرءان</td>
        <td>  تربية خاصة</td>
        <td class="colored">  المجموع الكلي لكل قطاع </td>
      </tr>
      <tr>

        <td colspan="2" class="gender1">معلمين</td>
        @php
        $subtotal=0;
        $total=0;

    @endphp
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_males_sum_teachers_num??0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_males_sum_teachers_num;

   @endphp
   @endfor

        <td class="total colored1">{{$subtotal}}</td>


      </tr>
      @php
      $total+=$subtotal;
      $subtotal=0;


  @endphp
      <tr>

        <td colspan="2" class="gender1">معلمات</td>
        @for ($i =0 ; $i <count($school_ratings) ; $i++)
        <td>{{$school_ratings->get($i)->schools_females_sum_teachers_num??0}}</td>
        @php
            $subtotal+=$school_ratings->get($i)->schools_females_sum_teachers_num;

        @endphp
        @endfor

        <td class="total colored1" >{{$subtotal}}</td>
      </tr>
      @php
          $total+=$subtotal;
      @endphp
      <tr>
        <td colspan="2" class="colored">المجموع الكلي لكل نوع</td>
        @foreach ($school_ratings as $school)
        <td class="colored1">{{$school->schools_females_sum_teachers_num+$school->schools_males_sum_teachers_num}}</td>
        @endforeach
        <td class="total colored">المجموع الكلي للمعلمين والمعلمات ={{$total}} معلم</td>
      </tr>

    </table>
  </div>
 <div class="table-responsive">
  <table class="table table-bordered allschools">

    <tr>
      <td colspan="2" class="colored colored-type">النوع</td>
      <td>تعليم عام</td>
      <td>تعليم أهلي</td>
      <td> تحفيظ قرءان</td>
      <td>  تربية خاصة</td>
      <td class="colored">  المجموع الكلي لكل قطاع </td>
    </tr>
    <tr>

      <td colspan="2" class="gender1">طلاب</td>
      @php
        $subtotal=0;
        $total=0;

    @endphp
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_males_sum_students_num??0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_males_sum_students_num;

   @endphp
   @endfor

        <td class="total colored1">{{$subtotal}}</td>
    </tr>
    <tr>
      <td colspan="2" class="gender1">طالبات</td>
      @php
      $total+=$subtotal;
        $subtotal=0;


    @endphp
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_females_sum_students_num??0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_females_sum_students_num;

   @endphp
   @endfor

        <td class="total colored1">{{$subtotal}}</td>
    </tr>
    <tr>
        @php
            $total+=$subtotal;
            $subtotal=0;
        @endphp
      <td colspan="2" class="colored">المجموع الكلي لكل نوع</td>
      @foreach ($school_ratings as $school)
            <td class="colored1">{{$school->schools_females_sum_students_num+$school->schools_males_sum_students_num}}</td>
            @endforeach
      <td class="total colored">المجموع الكلي للطلاب ={{$total}} طالب</td>
    </tr>

  </table>
 </div>
 <div class="table-responsive">
  <table class="table table-bordered allschools">


    <td colspan="4" class="gender1">مشرفين</td>

    <td class="total colored1" colspan="4">{{$male_supervisors}}</td>
  </tr>
  <tr>
    <td colspan="4" class="gender1">مشرفات</td>

    <td class="total colored1" colspan="4" >{{$female_supervisors}}</td>
  </tr>
  <tr>
 <td colspan="6"></td>
    <td class="total colored">المجموع الكلي للمشرفين ={{$male_supervisors+$female_supervisors}} مشرف ومشرفة</td>
  </tr>

</table>
 </div>











@endsection


