@extends('layout.app')
@section('title', 'پس گرفتن چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پس گرفتن چک', 'url' => url()->current()]],
    ])

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <span>پس گرفتن چک</span>
            </div>
        </div>
    </div>
@endsection
