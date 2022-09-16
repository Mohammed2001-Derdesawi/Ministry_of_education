<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'مكتب التعليم'])
<body>

  <div class="container">

   @include('Layouts.header')

    <br>
    <br>
    <br>
    @if (Session::has('success'))

    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>


    @endif
    <div>
      <h5 class="card-title">عدد المدارس الكلي</h5>
      <p class="card-text">{{$direction->schools_count}} مدرسة  </p>
      <a href="{{route('office.schools')}}" class="btn btn-primary show-btn">عرض جميع المدارس</a>

    </div>





    <table class="table table-bordered allschools">
      <tr>

      </tr>
      <tr>
        <td colspan="2" class="colored colored-type">النوع</td>
       @foreach ($school_ratings as $school_rating)
           <td>{{$school_rating->name}}</td>
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
        @for ($i =0 ; $i <count($school_ratings) ; $i++)
        <td>{{$school_ratings->get($i)->schools_males_count}}</td>
        @php
            $subtotal+=$school_ratings->get($i)->schools_males_count;

        @endphp
        @endfor

        @php
             $total+=$subtotal;
        @endphp


        <td class="total colored1">{{$total}}</td>



      </tr>
      <tr>
        <td class="gender1">بنات</td>
        @php
        $subtotal=0;

    @endphp
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_females_count}}</td>
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
        <td class="colored1">{{$school->schools_males_count+$school->schools_females_count}}</td>
        @endforeach
        <td class="total colored">المجموع الكلي للمدارس = {{$total}} مدرسة</td>
      </tr>

    </table>



    <div>
      <h5 class="card-title text-center"> عدد المشرفين الكلي {{$direction->super_count}}</h5>
      <div class="text-center">
        <a href="{{route('office.supervisor.create.page')}}" class="btn supervisor-sign " style="margin: 30x 0 20px 0" >تسجيل مشرف جديد</a>

      </div>
      <div class="table-responsive">
        <table class="table table-bordered allschools">

            <tr>
                <td colspan="4" class="gender1">مشرفين</td>

                <td class="total colored1" colspan="4" >{{$direction->count_super_male}}</td>
              </tr>

        <tr>
          <td colspan="4" class="gender1">مشرفات</td>

          <td class="total colored1" colspan="4" >{{$direction->count_super_female}}</td>
        </tr>

       <td colspan="6"></td>
          <td class="total colored">المجموع الكلي للمشرفين ={{$direction->count_super_female+$direction->count_super_male}} مشرف ومشرفة</td>
        </tr>

      </table>
       </div>



    </div>








    <div>
      <h5 class="card-title">عدد المعلمين الكلي</h5>
      <p class="card-text">معلم ومعلمة {{$direction->sh_teachers_total??0}}</p>



    </div>





    <table class="table table-bordered allschools">
      <tr>

      </tr>
      <tr>
        <td colspan="2" class="colored colored-type">النوع</td>
        @foreach ($school_ratings as $school_rating)
           <td>{{$school_rating->name}}</td>
       @endforeach
        <td class="colored">  المجموع الكلي لكل قطاع </td>
      </tr>
      <tr>

        <td colspan="2" class="gender1">معلمين</td>
        @php
        $subtotal=0;
        $total=0;

    @endphp
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_males_sum_teachers_num?$school_ratings->get($i)->schools_males_sum_teachers_num:0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_males_sum_teachers_num;

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
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_females_sum_teachers_num?$school_ratings->get($i)->schools_females_sum_teachers_num:0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_females_sum_teachers_num;

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
        <td class="colored1">{{$school->schools_females_sum_teachers_num+$school->schools_males_sum_teachers_num}}</td>
        @endforeach

        <td class="total colored">  المجموع الكلي  {{$total}} </td>
      </tr>

    </table>
    <div>
      <h5 class="card-title">عدد الطلاب والطالبات الكلي</h5>
      <p class="card-text">طالب وطالبة {{$direction->sh_students_total??0}}</p>



    </div>





    <table class="table table-bordered allschools">
      <tr>

      </tr>
      <tr>
        <td colspan="2" class="colored colored-type">النوع</td>
        @foreach ($school_ratings as $school_rating)
        <td>{{$school_rating->name}}</td>
        @endforeach
        <td class="colored">  المجموع الكلي لكل قطاع </td>
      </tr>
      <tr>

        <td colspan="2" class="gender1">طلاب</td>
        @php
        $subtotal=0;
        $total=0;

    @endphp
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_males_sum_students_num?$school_ratings->get($i)->schools_males_sum_students_num:0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_males_sum_students_num;

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
   @for ($i =0 ; $i <count($school_ratings) ; $i++)
   <td>{{$school_ratings->get($i)->schools_females_sum_students_num?$school_ratings->get($i)->schools_females_sum_students_num:0}}</td>
   @php
       $subtotal+=$school_ratings->get($i)->schools_females_sum_students_num;

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
        <td class="colored1">{{$school->schools_females_sum_students_num+$school->schools_males_sum_students_num}}</td>
        @endforeach
        <td class="total colored">   المجموع الكلي {{$total}} </td>
      </tr>

    </table>


    </div>



  </div>
</div>









   @include('Layouts.scripts')


</body>
</html>
