<!DOCTYPE html>
<html lang="ar" dir="rtl">

@include('Layouts.head',['title'=>'صفحة المدير'])
<body>

  <div class="container">

    @include('Layouts.header')
    @yield('content')

</div>








  @include('Layouts.scripts')

</body>
</html>
