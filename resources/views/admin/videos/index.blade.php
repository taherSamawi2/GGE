@extends('admin.layout')
@section('title', __('admin.index_video.page_title') )
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-play-circle-o "></i>
                    {{__('admin.index_video.page_label')}}
                </h3>
                <div>
                    <!-- Button to Open the Create Video -->
                    <button type="button" class="btn btn-primary px-3" data-toggle="modal" data-target="#addVideo">
                        <i class="fa fa-plus"></i>{{__('admin.index_video.create_button')}}
                    </button>
                </div>
            </div>

            <div class="col-12 page-content">

                <div class="row">
                    @foreach($videos as $video)
                        <div class="col-lg-4 col-12">
                            <div class="card-news">
                                <div class="news-img">
                                    <img src="{{$video->thumbnail}}" alt="">
                                </div>
                                <div class="news-info">
                                    <div>
                                        <h3>{{__('admin.index_video.en_title_field')}} :
                                            <span>{{$video->getTranslation('title','en')}}</span>
                                        </h3>
                                        <h3>{{__('admin.index_video.ar_title_field')}} :
                                            <span>{{$video->getTranslation('title','ar')}}</span>
                                        </h3>
                                    </div>
                                    <div class="card-btns">
                                        <form action="{{route('videos.delete',$video->id)}}" method="post"
                                              class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete-btn" type="submit">
                                                <i class="fa fa-trash-o delete-icon"></i>
                                            </button>
                                        </form>
                                        <!-- Button to Open the edit Video -->
                                        <i class="fa fa-edit edit-icon"
                                           id="edit-video" data-content="{{$video->id }}"
                                           data-toggle="modal" data-target="#editVideo"></i>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach
                    @if(count($videos) == 0)
                        <div class="col-12">
                            <h6 class="text-center">{{__('admin.index_video.page_empty')}} </h6>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Create New Video -->
            <div class="modal fade" id="addVideo">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fa fa-play-circle-o"></i>
                                {{__('admin.create_video.page_label')}}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" action="{{route('videos.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="en_title"> {{ __('admin.create_video.en_title_field') }}</label>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="ar_title"> {{ __('admin.create_video.ar_title_field') }}</label>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="url"> {{ __('admin.create_video.video_url_field') }}</label>
                                            <input type="text"
                                                   class="form-control
                                                   @error('url') is-invalid @enderror "
                                                   id="url" name="url"
                                                   value="{{old('url')}}">

                                            @error('url')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                        class="btn btn-primary btn-block p-2 my-3">{{ __('admin.create_video.button') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Video -->
            <div class="modal fade" id="editVideo">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fa fa-play-circle-o"></i>
                                {{__('admin.edit_video.page_label')}}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" class="update_video" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="en_title"> {{ __('admin.edit_video.en_title_field') }}</label>
                                            <input type="text"
                                                   class="form-control
                                                   @error('en_title') is-invalid @enderror "
                                                   id="edit_en_title" name="en_title">

                                            @error('en_title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="ar_title"> {{ __('admin.edit_video.en_title_field') }}</label>
                                            <input type="text"
                                                   class="form-control
                                                   @error('ar_title') is-invalid @enderror "
                                                   id="edit_ar_title" name="ar_title">

                                            @error('ar_title')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="url"> {{ __('admin.edit_video.video_url_field') }}</label>
                                            <input type="text"
                                                   class="form-control
                                                   @error('url') is-invalid @enderror "
                                                   id="edit_url" name="url">

                                            @error('url')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                        class="btn btn-primary btn-block p-2 my-3">{{ __('admin.edit_video.button') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
@endsection
