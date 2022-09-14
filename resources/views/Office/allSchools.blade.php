<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'جميع المدارس'])
<body>



    @include('Layouts.header')
    <div class="container-fluid">
      <form  method="GET" id="searchForm" class="all-schools-form3">
        @if (Session::has('success'))

<div class="alert alert-warning" role="alert">
    {{Session::get('success')}}
</div>


@endif


         <ul class="text-center" style="display: flex;justify-content: center;align-items: center;flex-direction: column;list-style-type: none">

            @foreach ($errors->messages() as $error)
             <div style="width: 200px;" class="text-center">
                <li>

                    <div class="alert alert-danger" role="alert">
                        {{$error[0]}}
                    </div>

                </li>
             </div>

            @endforeach
         </ul>


        <h2 class="school-name">جميع المدارس</h2>


        <input type="text" style="padding: 10px; margin: 10px 0" name="search" id="searchschool" placeholder="بحث في البيانات">
    </form>
        <div class="table-responsive">
            <form action="{{route('office.school.change')}}" method="POST">
                @csrf
          <table class="table table table-striped table-hover all-schools">
            <tr>
              <th></th>
              <th>اسم المدرسة</th>
              <th>اسم المدير</th>
                <th>القطاع </th>
                  <th>نوع المدرسة </th>
                  <th> الرقم الوزاري </th>
                    <th>المرحلة  </th>
                    <th>مكتب التعليم الحالي  </th>
                    <th>  عدد الطلاب   </th>
                    <th>  عدد المعلمين   </th>

                    <th>  عدد الوكلاء   </th>
                    <th>  عدد الموجهين الطلابيين    </th>
                    <th>  عدد رواد النشاط
                    </th>
                    <th>  عدد  الإداريين    </th>
                    <th>  عدد  محضري المختبرات    </th>
                    <th>  عدد  محضري معامل الحاسب    </th>

            </tr>
            @foreach ($schools as $school)


           <tr>
            <td><input type="checkbox" name="schools[{{$school->id}}]" value="{{$school->id}}" class="box"></td>
            <td> {{$school->name}}</td>
            <td> {{$school->director->name}}</td>
            <td> {{$school->gender=='male'?'بنين' :'بنات' }}</td>
            @if ($school->building_type=='state')
            <td>حكومي</td>
            @elseif ($school->building_type=='tenant')
            <td>مستأجر</td>
            @else
            <td>معار</td>

            @endif

            <td> {{$school->ministerial_number}}</td>
            @if ($school->level=='children')
            <td>رياض الأطفال</td>
            @elseif ($school->level=='secondary')
            <td>ابتدائي</td>
            @elseif ($school->level=='primary')
            <td>ثانوي</td>
            @else
            <td>متوسط</td>
            @endif

            <td> {{$school->direction->direction}}</td>
            <td> {{$school->students_num}}</td>
            <td> {{$school->teachers_num}}</td>
            <td> {{$school->agents_num}}</td>
            <td> {{$school->mentors_num}}</td>
            <td> {{$school->activity_pioneers_num}}</td>
            <td> {{$school->admins_num}}</td>
            <td> {{$school->exam_preparers_num}}</td>
            <td> {{$school->computer_laboratories_num}}</td>

           </tr>
           @endforeach
          </table>

          {{$schools->withQueryString()->links()}}
        </div>

        <!-- Button trigger modal -->
 <div class="row">
   <div class="col-lg-4">
    <button type="button" class="btn table-submit2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        إسناد لمكتب تعليم جديد
    </button>

   </div>
   <div class="col-lg-4">

    <a href="{{route('office.main')}}" class="btn table-submit2">
        الرجوع للصفحة الرئيسية
    </a>
   </div>

 </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">إسناد لأحد مكاتب التعليم</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="locations-libraries">


                @foreach ($directions as $direction)
                <div class="one-place">
                    <input type="radio" name="directions" id="" value="{{$direction->id}}">
                  <label for="">{{$direction->direction}}</label>


              </div>
              @endforeach


          </div>








      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <button type="submit" class="btn save-modal">حفظ</button>
      </div>
    </div>
  </div>
</div>
</form>
    </div>



</div>








 <script>
    $('#searchschool').keypress(function(e){
        if(e.which == 13){//Enter key pressed
          $("#searchForm").submit();
        }
    });
</script>

    @include('Layouts.scripts')


</body>
</html>
