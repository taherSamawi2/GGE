@extends('admin.layout')
@section('title', __('admin.create_establishmentsRegistration.page_title') )

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-plus"></i>
                    {{ __('admin.create_establishmentsRegistration.page_label') }}</h3>
            </div>
            <div class="col-12 page-content">
                <form method="POST" action="{{route('establishmentsRegistration.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row" >
                        <div class="col-12 mb-5">
                            <label> {{ __('admin.create_establishmentsRegistration.en_description_field') }}</label>
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
                            <label > {{ __('admin.create_establishmentsRegistration.ar_description_field') }}</label>
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
                    <button type="submit" class="btn btn-primary btn-block p-2 mb-2">{{ __('admin.create_establishmentsRegistration.button') }}</button>
                </form>
            </div>
        </div>


    </div>
@endsection
