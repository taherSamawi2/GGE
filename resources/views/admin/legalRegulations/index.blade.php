@extends('admin.layout')
@section('title', __('admin.index_legalRegulation.page_title') )
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-gavel "></i>
                    {{__('admin.index_legalRegulation.page_label')}}</h3>
                <div>
                    @isset($legalRegulation)
                        <form action="{{route('legalRegulations.delete',$legalRegulation->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn">
                                <i type="submit" class="fa fa-trash-o delete-icon"></i>
                            </button>
                        </form>
                        <a href="{{route('legalRegulations.edit',$legalRegulation->id)}}"><i class="fa fa-edit edit-icon "></i></a>

                    @endisset

                    @empty($legalRegulation)
                        <a href="{{route('legalRegulations.create')}}" class="btn btn-primary"><i
                                class="fa fa-plus"></i>{{__('admin.index_legalRegulation.create_button')}}</a>

                    @endempty
                </div>
            </div>


            <div class="col-12 page-content">
                <div class="content">
                    @isset($legalRegulation)
                        <div class="tabs">
                            <ul class="tabs-list">
                                <li class="active" data-content=".englishContent">{{__('admin.index_legalRegulation.english_tab')}}</li>
                                <li data-content=".arabicContent">{{__('admin.index_legalRegulation.arabic_tab')}}</li>
                            </ul>
                            <div class="content-list">
                                <div class="englishContent">
                                    {!! $legalRegulation->getTranslation('description','en')!!}
                                </div>
                                <div class="arabicContent">
                                    {!! $legalRegulation->getTranslation('description','ar')!!}
                                </div>
                            </div>
                        </div>
                    @endisset
                    @empty($legalRegulation)
                        <h6 class="text-center">{{__('admin.index_legalRegulation.page_empty')}} </h6>
                    @endempty
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
