
@php
    $title="جميع المشرفين";
@endphp
@extends('Administration.master')




    @section('content')
    <div class="container-fluid">
        @if (Session::has('success'))

        <div class="alert alert-info text-center" role="alert">
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
        <form  method="GET" id="searchForm" class="all-schools-form3">
        <h2 class="all-super">جميع المشرفين</h2>
        <br>
        <input type="text" id="searchsupervisor" name="search" style="padding: 10px; margin: 10px 0"  placeholder="بحث في البيانات">
    </form>
        <div class="table-responsive">
            <form action="{{route('admin.supervisors.change')}}" method="POST">
                @csrf

          <table class="table table table-striped table-hover all-schools">
            <tr>
              <th></th>
              <th>اسم المشرف</th>
              <th> السجل المدني</th>
                <th>التخصص الإشرافي </th>

            </tr>
            @foreach ($supervisors as $supervisor)


           <tr>
            <td><input type="checkbox" value="{{$supervisor->id}}" name="supervisors[{{$supervisor->id}}]" id="" class="box"></td>
             <td>{{$supervisor->name}}</td>
             <td>{{$supervisor->civil}}</td>
             <td>{{$supervisor->specialization->specialization}}</td>

           </tr>
           @endforeach


          </table>
          {{$supervisors->withQueryString()->links()}}
        </div>

        <!-- Button trigger modal -->

<div class="row">
    <div class="col-lg-4">
        <button type="button" class="btn table-submit2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            إسناد لمكتب تعليم جديد
        </button>

    </div>
    <div class="col-lg-4">

     <a href="{{route('admin.offices')}}" class="btn table-submit2">
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


          <div  class="one-place">
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












<script>
    $('#searchsupervisor').keypress(function(e){
        if(e.which == 13){//Enter key pressed
          $("#searchForm").submit();
        }
    });
</script>

@endsection




