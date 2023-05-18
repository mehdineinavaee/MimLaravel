@extends('layout.app')
@section('title', 'اعلام وصول دستی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'اعلام وصول دستی', 'url' => url()->current()]],
    ])

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <span>اعلام وصول دستی</span>
            </div>
        </div>
    </div>
@endsection
