@extends('layout.app')
@section('title', 'اعلام وصول چک های خوابانده شده')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'اعلام وصول چک های خوابانده شده', 'url' => url()->current()]],
    ])

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <span>اعلام وصول چک های خوابانده شده</span>
            </div>
        </div>
    </div>
@endsection
