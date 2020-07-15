@extends('admin.layout')

@section('main-content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                            {{ __('admin.dashboard.welcome') }} {{Auth::User()->name}}
                        <br>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
