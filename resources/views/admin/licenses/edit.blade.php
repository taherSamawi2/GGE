@extends('admin.layout')
@section('title',__('admin.edit_license.page_title'))
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error')}}</div>
                @endif
                <h3>
                    <i class="fa fa-edit"></i>
                    {{ __('admin.edit_license.page_label') }}</h3>
            </div>

            <div class="col-12 page-content">
                <form method="POST" action="{{route('licenses.update',$license->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row ">
{{--                        <div class="col-md-6 col-sm-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="en_title"> {{ __('admin.edit_license.en_title_field') }}</label>--}}
{{--                                <input type="text"--}}
{{--                                       class="form-control--}}
{{--                            @error('title') is-invalid @enderror "--}}
{{--                                       id="en_title" name="en_title"--}}
{{--                                       value="{{$license->getTranslation('title','en')}}">--}}

{{--                                @error('en_title')--}}
{{--                                <span class="text-danger">{{$message}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-sm-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="ar_title"> {{ __('admin.edit_license.ar_title_field') }}</label>--}}
{{--                                <input type="text"--}}
{{--                                       class="form-control--}}
{{--                            @error('title') is-invalid @enderror "--}}
{{--                                       id="ar_title" name="ar_title"--}}
{{--                                       value="{{$license->getTranslation('title','ar')}}">--}}

{{--                                @error('ar_title')--}}
{{--                                <span class="text-danger">{{$message}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-12 mb-5">
                            <label> {{ __('admin.edit_license.en_description_field') }}</label>
                            <textarea id="en_description"
                                      name="en_description"
                                      class="form-control @error('en_description') is-invalid @enderror">
                             {{$license->getTranslation('description','en')}}

                            </textarea>

                            @error('en_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <label > {{ __('admin.edit_license.ar_description_field') }}</label>
                            <textarea id="ar_description"
                                      name="ar_description"
                                      class="form-control @error('ar_description') is-invalid @enderror">
                                 {{$license->getTranslation('description','ar')}}
                            </textarea>

                            @error('ar_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block p-2 mb-2">{{ __('admin.edit_license.button') }}</button>
                </form>
            </div>


        </div>


    </div>
@endsection
