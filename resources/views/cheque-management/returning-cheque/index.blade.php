@extends('layout.app')
@section('title', 'برگشت چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'برگشت چک', 'url' => url()->current()]],
    ])

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <span>برگشت چک</span>
            </div>
        </div>
    </div>
@endsection
