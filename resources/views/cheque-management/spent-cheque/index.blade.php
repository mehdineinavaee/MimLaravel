@extends('layout.app')
@section('title', 'پس گرفتن چک خرج شده')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پس گرفتن چک خرج شده', 'url' => url()->current()]],
    ])

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <span>پس گرفتن چک خرج شده</span>
            </div>
        </div>
    </div>
@endsection
