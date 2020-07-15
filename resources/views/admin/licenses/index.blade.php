@extends('admin.layout')
@section('title', __('admin.index_license.page_title') )
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-gavel "></i>
                    {{__('admin.index_license.page_label')}}</h3>
                <div>
                    @isset($license)
                        <form action="{{route('licenses.delete',$license->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">
                                <i type="submit" class="fa fa-trash-o delete-icon"></i>
                            </button>
                        </form>
                        <a href="{{route('licenses.edit',$license->id)}}"><i class="fa fa-edit edit-icon "></i></a>

                    @endisset

                    @empty($license)
                        <a href="{{route('licenses.create')}}" class="btn btn-primary"><i
                                class="fa fa-plus"></i>{{__('admin.index_license.create_button')}}</a>

                    @endempty
                </div>
            </div>


            <div class="col-12 page-content">
                <div class="content">
                    @isset($license)
                        <div class="tabs">
                            <ul class="tabs-list">
                                <li class="active" data-content=".englishContent">{{__('admin.index_license.english_tab')}}</li>
                                <li data-content=".arabicContent">{{__('admin.index_license.arabic_tab')}}</li>
                            </ul>
                            <div class="content-list">
                                <div class="englishContent">
                                    {!! $license->getTranslation('description','en')!!}
                                </div>
                                <div class="arabicContent">
                                    {!! $license->getTranslation('description','ar')!!}
                                </div>
                            </div>
                        </div>
                    @endisset
                    @empty($license)
                        <h6 class="text-center">{{__('admin.index_license.page_empty')}} </h6>
                    @endempty
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
