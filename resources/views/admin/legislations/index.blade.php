@extends('admin.layout')
@section('title', __('admin.index_legislation.page_title') )
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-gavel "></i>
                    {{__('admin.index_legislation.page_label')}}</h3>
                <div>
                    @isset($legislation)
                        <form action="{{route('legislations.delete',$legislation->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">
                                <i type="submit" class="fa fa-trash-o delete-icon"></i>
                            </button>
                        </form>
                        <a href="{{route('legislations.edit',$legislation->id)}}"><i class="fa fa-edit edit-icon "></i></a>

                    @endisset

                    @empty($legislation)
                        <a href="{{route('legislations.create')}}" class="btn btn-primary"><i
                                class="fa fa-plus"></i>{{__('admin.index_legislation.create_button')}}</a>

                    @endempty
                </div>
            </div>


            <div class="col-12 page-content">
                <div class="content">
                    @isset($legislation)
                        <div class="tabs">
                            <ul class="tabs-list">
                                <li class="active" data-content=".englishContent">{{__('admin.index_legislation.english_tab')}}</li>
                                <li data-content=".arabicContent">{{__('admin.index_legislation.arabic_tab')}}</li>
                            </ul>
                            <div class="content-list">
                                <div class="englishContent">
                                    {!! $legislation->getTranslation('description','en')!!}
                                </div>
                                <div class="arabicContent">
                                    {!! $legislation->getTranslation('description','ar')!!}
                                </div>
                            </div>
                        </div>
                    @endisset
                    @empty($legislation)
                        <h6 class="text-center">{{__('admin.index_legislation.page_empty')}} </h6>
                    @endempty
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
