<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'تفاصيل المدرسة'])
<body>



    @include('Layouts.header')
    <div class="container">


        <h2 class="school-name">  {{$school->direction->direction}} / {{$school->name}}  </h2>
        @if (Session::has('success'))

        <div class="alert alert-info" role="alert">
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


        <div class="table-responsive table-responsive-sm table-responsive-md">

          <table class="table table table-striped table-hover all-schools">
            <tr>

              <th>اسم المدير  </th>
              <th>    القطاع </th>
              <th>    عدد المعلمين الكلي </th>
                <th> عدد المعلمين حسب التخصصات </th>
                <th>  عدد الطلاب </th>
                <th>   نوع المدرسة </th>

                <th> المرحلة    </th>
                <th> عدد الوكلاء الكلي    </th>
                <th> عدد الموجهين الطلابيين الكلي </th>
                <th> عدد رواد النشاط
                </th>

            </tr>
           <tr>

            <td>{{$school->director->name}}</td>
            <td>{{$school->gender=='male'?'بنين':'بنات'}}</td>
            <td>{{$school->teachers_num}}</td>
            <td>  <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary show-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
              عرض
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">عدد المعلمين حسب تخصصاتهم</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive teachers">

                        <table class="table teachers-modal">
                          <tr>
                            <th>التخصص</td>
                            <th>عدد المعلمين</td>
                          </tr>
                          @foreach ($specializations as $specialization)
                          <tr>
                            <td>{{$specialization->specialization}}</td>

                            <td>{{$specialization->schools->first()?$specialization->schools->first()->pivot->teachers_num:0}}</td>
                          </tr>
                          @endforeach


                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    </div>
                  </div>
                </div>
              </div>


            </td>
            <td>{{$school->students_num}}</td>
            <td>{{$school->rating->name}}</td>
            @if ($school->level=='children')
            <td>رياض الأطفال</td>
            @elseif ($school->level=='secondary')
            <td>ابتدائي</td>
            @elseif ($school->level=='primary')
            <td>ثانوي</td>
            @else
            <td>متوسط</td>
            @endif

            <td>{{$school->agents_num}}</td>
            <td>{{$school->mentors_num}}</td>
            <td>{{$school->activity_pioneers_num}}</td>







           </tr>

          </table>
        </div>

        <!-- Button trigger modal -->

        <div class="row">
            <div class="col-lg-4">
                <button type="button" class="btn table-submit2" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                      تسجيل لمكتب تعليم جديد
                </button>

            </div>
            <div class="col-lg-4">


             <a href="{{route('admin.offices')}}" class="btn table-submit2">
                 الرجوع للصفحة الرئيسية
             </a>
            </div>
            <div class="col-lg-4">

                  <form action="{{route('admin.school.change',$school->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn table-submit2 table-submit3">{{$school->status?'فتح':"إغلاق"}} المدرسة</button>
                </form>

               </div>
          </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">إرجاع لأحد مكاتب التعليم</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin.school.trasfer',$school->id)}}" method="POST" class="all-schools-form1">
            @csrf
        <div class="locations-libraries">
            @foreach ($directions as $direction)
            <div class="one-place">
                <input type="radio" value="{{$direction->id}}" name="direction" id="">
              <label for="">{{$direction->direction}}</label>
              </div>
            @endforeach



          </div>








      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
        <button type="submit" class="btn save-modal">إسناد</button>
      </div>
    </div>
  </div>
</div>


      </form>
    </div>



</div>








  @include('Layouts.scripts')


</body>
</html>
