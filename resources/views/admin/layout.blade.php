<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('gge.ico') }}">
    <link rel="stylesheet" href=" {{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('/css/font-awesome.css') }}">
    <link rel="stylesheet" href=" {{ asset('/css/admin-style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">


</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="logo">
            <a href=""><img src="/imgs/gge-icon.svg"></a>
        </div>

        <div class="user-info">
            <div class="profile-img">
                <img src="/imgs/profile-img.png" alt="profile-img">
            </div>
            <h3>
                {{Auth::User()->name}}
            </h3>
        </div>
        <ul class="main-menu">

            <li>
                <a href="{{route('licenses.index')}}" class="{{request()->path()==="admin/pages"?'active':'' }}">
                      <span class="icon">
                            <i class="fa fa-window-maximize " aria-hidden="true"></i>
                      </span>
                    <span class="title">{{__('admin.sidebar.pages')}}</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('licenses.index')}}"><span class="title">{{__('admin.sidebar.license_page')}}</span></a></li>
                    <li><a href="{{route('legislations.index')}}"><span class="title">{{__('admin.sidebar.legislations_page')}}</span></a></li>
                    <li><a href="{{route('legalRegulations.index')}}"><span class="title">{{__('admin.sidebar.legal_regulations_page')}}</span></a></li>
                    <li><a href="{{route('establishmentsRegistration.index')}}"><span class="title">{{__('admin.sidebar.Establishments_registration_page')}}</span></a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('news.index')}}" class="{{request()->path()==="admin/news"?'active':'' }}">
                <span class="icon">
                           <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                      </span>
                    <span class="title">{{__('admin.sidebar.news')}}</span>

                </a>
            </li>

            <li>
                <a href="{{route('videos.index')}}" class="{{request()->path()==="admin/videos"?'active':'' }}">
                <span class="icon">
                           <i class="fa fa-play" aria-hidden="true"></i>
                      </span>
                    <span class="title">{{__('admin.sidebar.videos')}}</span>

                </a>
            </li>

            <li>
                <a href="{{route('books.index')}}" class="{{request()->path()==="admin/books"?'active':'' }}">
                <span class="icon">
                           <i class="fa fa-book" aria-hidden="true"></i>
                      </span>
                    <span class="title">{{__('admin.sidebar.books')}}</span>

                </a>
            </li>

        </ul>
    </div>
    <div class="box-content ">
        <div class="top-nav">
            <div class="top-menu">
                <div class="hamburger">
                    <i class="fa fa-align-justify"></i>
                </div><div>

                <ul>
{{--                        <li class="li-settings">--}}
{{--                            <i class="fa fa-cog "></i>--}}
{{--                            <div class="card card-settings ">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">My Profile</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Settings</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#"--}}
{{--                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                                            logout</a>--}}
{{--                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
{{--                                              style="display: none;">--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li class="li-settings">
                            <i class="fa fa-globe "></i>
                            <div class="card card-settings ">
                                <ul>
                                    <li> <a href="{{ url('admin/lang/en')}}"><i class="fa fa-flag"></i>English</a></li>
                                    <li> <a href="{{ url('admin/lang/ar')}}"><i class="fa fa-flag"></i>عربي </a></li>
                                </ul>
                            </div>
                        </li>

                        <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
                        <li class="profile-img">
                            <img src="/imgs/profile-img.png" alt="profile-img">
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        <div class="main-content">
            @yield('main-content')
        </div>
    </div>
</div>


<script src="{{ asset('/js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/query.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('/js/admin.js') }}"></script>

<script>
    $("#edit-book").on("click",function () {
        let id =$(this).data('content');
            $.ajax({
                method:'GET', //Method Used For The Request
                url:'/admin/books/'+id+'/edit', // URL To Send The Request , Default is current URL
                success:function (book,status,xhr){
                    //Function To Run When Request Is Succeeded
                    console.log(book); //Data
                    $('#edit_en_name').val(book.data.en_name);
                    $('#edit_ar_name').val(book.data.ar_name);

                    $('.container-previewPDF').css('display', 'flex');
                    $(".pdf_name").html(book.data.book.file_name);

                    $('.container-previewImg').css('display', 'block');
                    $(".edit_previewImg").attr("src", book.data.book_image_url);
                    $(".update_book").attr("action","/admin/books/"+id);



                    // $('#edit_book').val(book.data.book.file_name);
                    // console.log(status); //Request Status
                    // console.log(xhr); //XHR Object

                    // $('#show').html(data);
                },
                error:function (xhr,status,error){
                    //Function To Run When Request IS field
                    console.log(xhr);  // XHR Object
                    console.log(status); // Request Status
                    console.log(error); // Error Message
                },

            })
    })

    $("#edit-video").on("click",function () {
        let video_id =$(this).data('content');
        $.ajax({
            method:'GET', //Method Used For The Request
            url:'/admin/videos/'+video_id+'/edit', // URL To Send The Request , Default is current URL
            success:function (video,status,xhr){
                //Function To Run When Request Is Succeeded
                console.log(video); //Data
                $('#edit_en_title').val(video.title.en);
                $('#edit_ar_title').val(video.title.ar);
                $('#edit_url').val(video.url);

                $(".update_video").attr("action","/admin/videos/"+video_id);

                // console.log(status); //Request Status
                // console.log(xhr); //XHR Object

            },
            error:function (xhr,status,error){
                //Function To Run When Request IS field
                console.log(xhr);  // XHR Object
                console.log(status); // Request Status
                console.log(error); // Error Message
            },

        })
    })


</script>

</body>
</html>
