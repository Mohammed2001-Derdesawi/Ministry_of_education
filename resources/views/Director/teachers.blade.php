@extends('Director.master')
@section('content')


@if (Session::has('warning'))


<div class="alert alert-warning" role="alert">
    {{Session::get('warning')}}
</div>
@endif
    <h2 class="title1">عدد المعلمين حسب تخصصاتهم</h2>
    <form action="{{route('director.school.create')}}" method="POST">
        @csrf
        <h2 class="title1">  حدد موقع المدرسة </h2>
    <div class="location">
      <input type="text" name="region" value="{{old("region")}}" class="place" placeholder="اسم الحي">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("region")}}

    </span>
      <input type="text" name="street" class="place"  value="{{old('street')}}" placeholder="اسم الشارع">
      <span class="text-danger" style="padding: 10px 0;">
        {{$errors->first("street")}}

    </span>


    </div>
      <div class="table-responsive teachers">

        <table class="table teachers-spec">
          <tr>
            <th>التخصص</td>
            <th>عدد المعلمين</td>
          </tr>
          @foreach ($specializations as $specialization)
          <tr>
              <td>{{$specialization->specialization}}</td>
              <td> <input name="specializations[{{$specialization->id}}]" type="text" placeholder="أدخل عدد المعلمين"></td>
          </tr>
              @endforeach

              <span class="text-danger" style="padding: 10px 0;">
                {{$errors->first("specializations")}}

            </span>

        </table>
      </div>
      <input type="submit" class="table-submit2">
    </form>
@endsection
