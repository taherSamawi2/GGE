@extends('admin.layout')
@section('title', __('admin.index_book.page_title') )
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 page-label">
                <h3>
                    <i class="fa fa-book"></i>
                    {{__('admin.index_book.page_label')}}
                </h3>
                <div>
                    <!-- Button to Open the Create Book -->
                    <button type="button" class="btn btn-primary px-3" data-toggle="modal" data-target="#addBook">
                        <i class="fa fa-plus"></i>{{__('admin.index_book.create_button')}}
                    </button>
                </div>
            </div>

            <div class="col-12 page-content">

                <div class="row">
                    @foreach($books as $book)
                        <div class="col-lg-6 col-12">
                            <div class="card-book">
                                <div class="book-img">
                                    <img src="{{$book->getFirstMediaUrl('books_images')}}" alt="">
                                </div>
                                <div class="book-info">
                                    <div>
                                        <h3>{{__('admin.index_book.en_name_field')}} :
                                            <span>{{$book->getTranslation('name','en')}}</span>
                                        </h3>
                                        <h3>{{__('admin.index_book.ar_name_field')}} :
                                            <span>{{$book->getTranslation('name','ar')}}</span>
                                        </h3>
                                    </div>
                                    <div class="card-btns">
                                        <form action="{{route('books.delete',$book->id)}}" method="post" class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="delete-btn" type="submit">
                                                <i class="fa fa-trash-o delete-icon"></i>
                                            </button>
                                        </form>
                                        <!-- Button to Open the edit Book -->
                                        <i class="fa fa-edit edit-icon"
                                           id="edit-book" data-content="{{$book->id }}"
                                           data-toggle="modal" data-target="#editBook"></i>
                                    </div>

                                </div>
                            </div>
                        </div>


                    @endforeach
                    @if(count($books) == 0)
                            <div class="col-12">
                                <h6 class="text-center">{{__('admin.index_book.page_empty')}} </h6>
                            </div>
                    @endif
                </div>

            </div>

            <!-- Create New Book -->
            <div class="modal fade" id="addBook">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fa fa-book"></i>
                                {{__('admin.create_book.page_label')}}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="en_name"> {{ __('admin.create_book.en_name_field') }}</label>
                                            <input type="text"
                                                   class="form-control
                                                   @error('name') is-invalid @enderror "
                                                   id="en_name" name="en_name"
                                                   value="{{old('en_name')}}">

                                            @error('en_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="ar_name"> {{ __('admin.create_book.ar_name_field') }}</label>
                                            <input type="text"
                                                   class="form-control
                                                  @error('name') is-invalid @enderror "
                                                   id="ar_name" name="ar_name"
                                                   value="{{old('ar_name')}}">

                                            @error('ar_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> {{ __('admin.create_book.book_img_field') }}</label>
                                            <input type="file" name="book_img"
                                                   accept="image/*"
                                                   class="book_img
                                                   @error('book_img') is-invalid @enderror "
                                                   value="{{old('book_img')}}"
                                                   data-content="{{ __('admin.create_book.label_book') }}">
                                            @error('book_img')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="container-previewImg">
                                            <img id="previewImg" src="" alt="">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> {{ __('admin.create_book.book_file_field') }}</label>
                                            <input type="file" name="book"
                                                   accept="application/pdf"
                                                   class="book_pdf @error('book') is-invalid @enderror "
                                                   value="{{old('book')}}"
                                                   data-content="{{ __('admin.create_book.label_book') }}">
                                            @error('book')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="container-previewPDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                            <span class="pdf_name"></span>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit"
                                        class="btn btn-primary btn-block p-2 my-3">{{ __('admin.create_book.button') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Edit Book -->
            <div class="modal fade" id="editBook">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fa fa-book"></i>
                                {{__('admin.edit_book.page_label')}}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST" class="update_book" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="en_name"> {{ __('admin.edit_book.en_name_field') }}</label>
                                            <input type="text"
                                                   class="form-control
                                                   @error('name') is-invalid @enderror "
                                                   id="edit_en_name" name="en_name">
                                            @error('en_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="ar_name"> {{ __('admin.edit_book.ar_name_field') }}</label>
                                            <input type="text"
                                                   class="form-control
                                                  @error('name') is-invalid @enderror "
                                                   id="edit_ar_name" name="ar_name">
                                            @error('ar_name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> {{ __('admin.edit_book.book_img_field') }}</label>
                                            <input type="file" name="book_img"
                                                   id="edit_book_img"
                                                   accept="image/*"
                                                   class="edit_book_img
                                                   @error('book_img') is-invalid @enderror "
                                                   data-content="{{ __('admin.edit_book.label_book') }}">
                                            @error('book_img')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="container-previewImg">
                                            <img class="edit_previewImg" src="" alt="Placeholder">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label> {{ __('admin.edit_book.book_file_field') }}</label>
                                            <input type="file" name="book"
                                                   id="edit_book"
                                                   accept="application/pdf"
                                                   class="book_pdf @error('book') is-invalid @enderror "
                                                   data-content="{{ __('admin.edit_book.label_book') }}">
                                            @error('book')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="container-previewPDF">
                                            <i class="fa fa-file-pdf-o"></i>
                                            <span class="pdf_name"></span>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit"
                                        class="btn btn-primary btn-block p-2 my-3">{{ __('admin.edit_book.button') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
@endsection

