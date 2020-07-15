@extends('admin.layout')
@section('title', __('admin.index_establishmentsRegistration.page_title') )
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-map-signs "></i>
                    {{__('admin.index_establishmentsRegistration.page_label')}}</h3>
                <div>
                    @isset($establishmentsRegistration)
                        <form action="{{route('establishmentsRegistration.delete',$establishmentsRegistration->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">
                                <i type="submit" class="fa fa-trash-o delete-icon"></i>
                            </button>
                        </form>
                        <a href="{{route('establishmentsRegistration.edit',$establishmentsRegistration->id)}}"><i class="fa fa-edit edit-icon "></i></a>

                    @endisset

                    @empty($establishmentsRegistration)
                        <a href="{{route('establishmentsRegistration.create')}}" class="btn btn-primary"><i
                                class="fa fa-plus"></i>{{__('admin.index_establishmentsRegistration.create_button')}}</a>

                    @endempty
                </div>
            </div>


            <div class="col-12 page-content">
                <div class="content">
                    @isset($establishmentsRegistration)
                        <div class="tabs">
                            <ul class="tabs-list">
                                <li class="active" data-content=".englishContent">{{__('admin.index_establishmentsRegistration.english_tab')}}</li>
                                <li data-content=".arabicContent">{{__('admin.index_establishmentsRegistration.arabic_tab')}}</li>
                            </ul>
                            <div class="content-list">
                                <div class="englishContent">
                                    {!! $establishmentsRegistration->getTranslation('description','en')!!}
                                </div>
                                <div class="arabicContent">
                                    {!! $establishmentsRegistration->getTranslation('description','ar')!!}
                                </div>
                            </div>
                        </div>
                    @endisset
                    @empty($establishmentsRegistration)
                        <h6 class="text-center">{{__('admin.index_establishmentsRegistration.page_empty')}} </h6>
                    @endempty
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
