@extends('admin.layout')
@section('title', __('admin.create_license.page_title') )

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-plus"></i>
                    {{ __('admin.create_license.page_label') }}</h3>
            </div>
            <div class="col-12 page-content">
                <form method="POST" action="{{route('licenses.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
{{--                        <div class="col-md-6 col-sm-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="en_title"> {{ __('admin.create_license.en_title_field') }}</label>--}}
{{--                                <input type="text"--}}
{{--                                       class="form-control--}}
{{--                            @error('title') is-invalid @enderror "--}}
{{--                                       id="en_title" name="en_title"--}}
{{--                                       value="{{old('en_title')}}">--}}

{{--                                @error('en_title')--}}
{{--                                <span class="text-danger">{{$message}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="col-md-6 col-sm-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="ar_title"> {{ __('admin.create_license.ar_title_field') }}</label>--}}
{{--                                <input type="text"--}}
{{--                                       class="form-control--}}
{{--                            @error('title') is-invalid @enderror "--}}
{{--                                       id="ar_title" name="ar_title"--}}
{{--                                       value="{{old('ar_title')}}">--}}

{{--                                @error('ar_title')--}}
{{--                                <span class="text-danger">{{$message}}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="col-12 mb-5">
                        <label> {{ __('admin.create_license.en_description_field') }}</label>
                            <textarea id="en_description"
                                      name="en_description"
                                      class="form-control @error('en_description') is-invalid @enderror">
                             {{old('en_description')}}
                            </textarea>

                            @error('en_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                            <label > {{ __('admin.create_license.ar_description_field') }}</label>
                            <textarea id="ar_description"
                                      name="ar_description"
                                      class="form-control @error('ar_description') is-invalid @enderror">
                             {{old('ar_description')}}
                            </textarea>

                            @error('ar_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block p-2 mb-2">{{ __('admin.create_license.button') }}</button>
                </form>
            </div>
        </div>


    </div>
@endsection
