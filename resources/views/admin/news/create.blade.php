@extends('admin.layout')
@section('title', __('admin.create_news.page_title') )

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-newspaper-o"></i>
                    {{ __('admin.create_news.page_label') }}</h3>
            </div>
            <div class="col-lg-10 col-12 page-content">
                <form method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="en_title"> {{ __('admin.create_news.en_title_field') }}</label>
                                <input type="text"
                                       class="form-control
                                       @error('en_title') is-invalid @enderror "
                                       id="en_title" name="en_title"
                                       value="{{old('en_title')}}">

                                @error('en_title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="ar_title"> {{ __('admin.create_news.ar_title_field') }}</label>
                                <input type="text"
                                       class="form-control
                            @error('ar_title') is-invalid @enderror "
                                       id="ar_title" name="ar_title"
                                       value="{{old('ar_title')}}">

                                @error('ar_title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class=" col-md-6 col-12">
                            <div class="form-group">
                                <label> {{ __('admin.create_news.news_img_field') }}</label>
                                <input type="file" name="news_img"
                                       accept="image/*"
                                       class="news_img @error('news_img') is-invalid @enderror "
                                       value="{{old('news_img')}}"
                                       data-content="{{ __('admin.create_news.label_img_input') }}">
                                @error('news_img')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="container-previewImg">
                                <img id="previewImg" src="" alt="">
                            </div>
                        </div>
                        <div class="col-12 mb-5">
                            <label> {{ __('admin.create_news.en_content_field') }}</label>
                            <textarea id="en_description"
                                      name="en_content"
                                      class="form-control @error('en_content') is-invalid @enderror">
                             {{old('en_content')}}
                            </textarea>

                            @error('en_content')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <label > {{ __('admin.create_news.ar_content_field') }}</label>
                            <textarea id="ar_description"
                                      name="ar_content"
                                      class="form-control @error('ar_content') is-invalid @enderror">
                             {{old('ar_content')}}
                            </textarea>

                            @error('ar_content')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-block p-2 my-5">{{ __('admin.create_news.button') }}</button>
                </form>
            </div>
        </div>


    </div>
@endsection
