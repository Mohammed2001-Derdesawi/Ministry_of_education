<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'تفاصيل المكتب'])
<body>



    @include('Layouts.header')
    <div class="container">

      <form action="" class="all-schools-form">
        <div class="table-stats">
          <h2 class="">جميع الإحصائيات</h2>
          <table class="table stats">

            <tbody>
              <tr>

                    <th>عدد المدارس الكلي </th>
                    <td>{{$direction->schools_count}}</td>

                  </tr>
                  <tr>
                    <th>عدد المديرين</th>
                    <td>{{$direction->admins_male??0}}</td>

                  </tr>
                  <tr>
                    <th>عدد المديرات</th>
                    <td>{{$direction->admins_female??0}}</td>

                  </tr>
                  <tr>
                    <th>عدد المعلمين</th>
                    <td>{{$direction->teachers_male??0}}</td>


              </tr>
              <tr>
                <th>عدد المعلمات</th>
                <td>{{$direction->teachers_female??0}}</td>


          </tr>
          <tr>
            <th>عدد الطلاب</th>
            <td>{{$direction->students_male??0}}</td>


      </tr>
      <tr>
        <th>عدد الطالبات</th>
        <td>{{$direction->students_female??0}}</td>


  </tr>
  <tr>
    <th>عدد الوكلاء</th>
    <td>{{$direction->agnets_num??0}}</td>


  </tr>
  <tr>
    <th>عدد الموجهين الطلابيين الكلي</th>
    <td>{{$direction->mentors_num??0}}</td>


  </tr>
  <tr>
    <th>عدد رواد النشاط</th>
    <td>{{$direction->activites_num??0}}</td>


  </tr>


            </tbody>
          </table>

        </div>

        <div class="table-responsive schools">

          <h3>إجمالي عدد المدارس في مكتب  التعليم <span>{{$direction->schools_count??0}}</span></h3>

          <h4>قائمة المدارس المسندة للمكتب</h4>
          <form method="GET" id="searchForm">
            @csrf
            <input type="text" name="search" style="padding: 10px 3px;margin: 10px 0 20px" id="searchschool"  placeholder="بحث في المدارس">
          </form>

          <ul>
            @foreach ($schools as $school)
            <li> <a href="{{route('admin.school.show',$school->id)}}">{{$school->name}}</a> </li>
            @endforeach



          </ul>
          {{$schools->withQueryString()->links()}}
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
