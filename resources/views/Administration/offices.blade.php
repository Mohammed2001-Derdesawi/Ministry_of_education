<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'جميع مكاتب التعليم'])
<body>

  <div class="container">

    @include('Layouts.header')
    <h2 class="all-offices">جميع مكاتب التعليم</h2>
    <p class="card-text">عدد المشرفين {{$count_supervisors}}  </p>
    <a href="{{route('admin.supervisors')}}" class="btn btn-primary show-btn" >عرض </a>
   <div class="card-details">


     @foreach ($directions as $direction)


    <div class="card edu-off">



        <h5 class="card-title">{{$direction->direction}}</h5>
        <p class="card-text">عدد المدارس {{$direction->schools_count}}  </p>
        <a href="{{route('admin.direction.details',$direction->id)}}" class="btn btn-primary show-btn" >عرض </a>

      <div class="table-responsive">
        <table class="table table-bordered allschools">

          <tr>
            <td colspan="2" class="colored colored-type">النوع</td>
            @foreach ($direction->ratings as $ratings)
            <td>{{$ratings->name}}</td>
            @endforeach


            <td class="colored">  المجموع الكلي لكل قطاع </td>
          </tr>
          <tr>
            <td rowspan="2" class="gender1 colored-type">القطاع</td>
            <td class="gender1">بنين</td>
            @php
            $subtotal=0;
            $total=0;

        @endphp
       @for ($i =0 ; $i <count($direction->ratings) ; $i++)
       <td>{{$direction->ratings->get($i)->schools_males_count?$direction->ratings->get($i)->schools_males_count:0}}</td>
       @php
           $subtotal+=$direction->ratings->get($i)->schools_males_count;

       @endphp
       @endfor

       @php
            $total+=$subtotal;
       @endphp

            <td class="total colored1">{{$subtotal}}</td>
          </tr>
          <tr>
            <td class="gender1">بنات</td>
            @php
            $subtotal=0;


        @endphp
       @for ($i =0 ; $i <count($direction->ratings) ; $i++)
       <td>{{$direction->ratings->get($i)->schools_females_count?$direction->ratings->get($i)->schools_females_count:0}}</td>
       @php
           $subtotal+=$direction->ratings->get($i)->schools_females_count;

       @endphp
       @endfor

       @php
            $total+=$subtotal;
       @endphp

            <td class="total colored1" >{{$subtotal}}</td>
          </tr>
          <tr>
            <td colspan="2" class="colored">المجموع الكلي لكل نوع</td>
            @foreach ($direction->ratings as $school)
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
            @foreach ($direction->ratings as $ratings)
            <td>{{$ratings->name}}</td>
            @endforeach
            <td class="colored">  المجموع الكلي لكل قطاع </td>
          </tr>
          <tr>

            <td colspan="2" class="gender1">معلمين</td>
            @php
            $subtotal=0;
            $total=0;

        @endphp
       @for ($i =0 ; $i <count($direction->ratings) ; $i++)
       <td>{{$direction->ratings->get($i)->schools_males_sum_teachers_num?$direction->ratings->get($i)->schools_males_sum_teachers_num:0}}</td>
       @php
           $subtotal+=$direction->ratings->get($i)->schools_males_sum_teachers_num;

       @endphp
       @endfor

       @php
            $total+=$subtotal;
       @endphp

            <td class="total colored1">{{$subtotal}}</td>
          </tr>
          <tr>
            <td colspan="2" class="gender1">معلمات</td>
            @php
        $subtotal=0;


    @endphp
   @for ($i =0 ; $i <count($direction->ratings) ; $i++)
   <td>{{$direction->ratings->get($i)->schools_females_sum_teachers_num?$direction->ratings->get($i)->schools_females_sum_teachers_num:0}}</td>
   @php
       $subtotal+=$direction->ratings->get($i)->schools_females_sum_teachers_num;

   @endphp
   @endfor

   @php
        $total+=$subtotal;
   @endphp
        <td class="total colored1" >{{$subtotal}}</td>
          </tr>
          <tr>
            <td colspan="2" class="colored">المجموع الكلي لكل نوع</td>
            @foreach ($direction->ratings as $school)
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
          @foreach ($direction->ratings as $ratings)
          <td>{{$ratings->name}}</td>
          @endforeach
          <td class="colored">  المجموع الكلي لكل قطاع </td>
        </tr>
        <tr>

          <td colspan="2" class="gender1">طلاب</td>
          @php
        $subtotal=0;
        $total=0;

    @endphp
   @for ($i =0 ; $i <count($direction->ratings) ; $i++)
   <td>{{$direction->ratings->get($i)->schools_males_sum_students_num?$direction->ratings->get($i)->schools_males_sum_students_num:0}}</td>
   @php
       $subtotal+=$direction->ratings->get($i)->schools_males_sum_students_num;

   @endphp
   @endfor

   @php
        $total+=$subtotal;
   @endphp
          <td class="total colored1">{{$subtotal}}</td>
        </tr>
        <tr>
          <td colspan="2" class="gender1">طالبات</td>
          @php
        $subtotal=0;


    @endphp
   @for ($i =0 ; $i <count($direction->ratings) ; $i++)
   <td>{{$direction->ratings->get($i)->schools_females_sum_students_num?$direction->ratings->get($i)->schools_females_sum_students_num:0}}</td>
   @php
       $subtotal+=$direction->ratings->get($i)->schools_females_sum_students_num;

   @endphp
   @endfor

   @php
        $total+=$subtotal;
   @endphp
          <td class="total colored1" >{{$total}}</td>
        </tr>
        <tr>
          <td colspan="2" class="colored">المجموع الكلي لكل نوع</td>
          @foreach ($direction->ratings as $school)
          <td class="colored1">{{$school->schools_females_sum_students_num+$school->schools_males_sum_students_num}}</td>
          @endforeach
          <td class="total colored">المجموع الكلي للطلاب ={{$total}} طالب</td>
        </tr>

      </table>
     </div>
     <div class="table-responsive">
      <table class="table table-bordered allschools">


        <td colspan="4" class="gender1">مشرفين</td>

        <td class="total colored1" colspan="4">{{$direction->count_super_male}}</td>
      </tr>
      <tr>
        <td colspan="4" class="gender1">مشرفات</td>

        <td class="total colored1" colspan="4" >{{$direction->count_super_female}}</td>
      </tr>
      <tr>
     <td colspan="6"></td>
        <td class="total colored">المجموع الكلي للمشرفين ={{$direction->count_super_male+$direction->count_super_female}} مشرف ومشرفة</td>
      </tr>

    </table>
     </div>


    </div>
    @endforeach



   </div>


</div>









@include('Layouts.scripts')


</body>
</html>
