@extends('admin.layout')
@section('title',__('admin.edit_legalRegulation.page_title'))
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                @if(session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error')}}</div>
                @endif
                <h3>
                    <i class="fa fa-edit"></i>
                    {{ __('admin.edit_legalRegulation.page_label') }}</h3>
            </div>

            <div class="col-12 page-content">
                <form method="POST" action="{{route('legalRegulations.update',$legalRegulation->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row ">
                        <div class="col-12 mb-5">
                            <label> {{ __('admin.edit_legalRegulation.en_description_field') }}</label>
                            <textarea id="en_description"
                                      name="en_description"
                                      class="form-control @error('en_description') is-invalid @enderror">
                             {{$legalRegulation->getTranslation('description','en')}}

                            </textarea>

                            @error('en_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-5">
                        <label > {{ __('admin.edit_legalRegulation.ar_description_field') }}</label>
                            <textarea id="ar_description"
                                      name="ar_description"
                                      class="form-control @error('ar_description') is-invalid @enderror">
                                 {{$legalRegulation->getTranslation('description','ar')}}
                            </textarea>

                            @error('ar_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block p-2 mb-2">{{ __('admin.edit_legalRegulation.button') }}</button>
                </form>
            </div>


        </div>


    </div>
@endsection
