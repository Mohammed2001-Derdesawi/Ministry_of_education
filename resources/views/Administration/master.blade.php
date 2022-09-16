<!DOCTYPE html>
<html lang="ar" dir="rtl">
@include('Layouts.head',['title'=> $title])
<body>
    <div class="wrapper">
        <div class="body-overlay"></div>

        <div class="container-fluid"></div>


                <!-- Sidebar  -->
                <nav id="sidebar">

                    <ul class="list-unstyled components">





                        <li class="dropdown">

                            <a href="#homeSubmenu1" data-bs-toggle="collapse"  type="button" aria-expanded="false" class="dropdown-toggle">
                             <span> المكاتب التعليمية</span></a>
                            <ul class="collapse list-unstyled menu" aria-labelledby="homeSubmenu1" id="homeSubmenu1">
                                @foreach ($menu_directions as $direction)


                                <li>
                                    <a href="{{route('admin.office.show',$direction->id)}}">{{$direction->direction}}</a>
                                </li>
                                @endforeach


                            </ul>
                        </li>
                        <li class="dropdown">

                            <a href="{{route('admin.supervisors')}}">
                             <span>عرض جميع المشرفين</span></a>

                        </li>




                       <li class="">
                        <form action="{{route('admin.logout')}}" method="post">
                            @csrf
                            <button type="submit" style="background: none; border: 0" ><i class="fas fa-sign-out-alt"></i><span>تسجيل الخروج</span></button>

                        </form>
                        </li>

                    </ul>

                </nav>



                    <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-ellipsis-v"></i>
                    </button>

                <div class="main-content">
                @include('Layouts.header')

                    @yield('content')



                </div>






                </div>
            </div>
            @include('Layouts.scripts')






</body>
</html>
