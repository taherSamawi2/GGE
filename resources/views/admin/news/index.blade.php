@extends('admin.layout')
@section('title', __('admin.index_news.page_title') )
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-play-circle-o "></i>
                    {{__('admin.index_news.page_label')}}
                </h3>
                <div>
                    <a href="{{route('news.create')}}" class="btn btn-primary"><i
                            class="fa fa-plus"></i>{{__('admin.index_news.create_button')}}</a>
                </div>

            </div>


            <div class="col-12 page-content">
                <div class="row">
                    @foreach($news as $news1)
                        <div class="col-lg-4 col-12">
                            <div class="card-news">
                                <div class="news-img">
                                    <img src="{{$news1->getFirstMediaUrl('news_images')}}" alt="">
                                </div>
                                <div class="news-info">
                                    <div>
                                        <h3>{{__('admin.index_news.en_title_field')}} :
                                            <span>{{$news1->getTranslation('title','en')}}</span>
                                        </h3>
                                        <h3>{{__('admin.index_news.ar_title_field')}} :
                                            <span>{{$news1->getTranslation('title','ar')}}</span>
                                        </h3>
                                    </div>
                                    <div class="card-btns">
                                        <form action="{{route('news.delete',$news1->id)}}" method="post"
                                              class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete-btn" type="submit">
                                                <i class="fa fa-trash-o delete-icon"></i>
                                            </button>
                                        </form>
                                        <a href="{{route('news.edit',$news1->id)}}"><i class="fa fa-edit edit-icon "></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach
                    @if(count($news) == 0)
                        <div class="col-12">
                            <h6 class="text-center">{{__('admin.index_news.page_empty')}} </h6>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
