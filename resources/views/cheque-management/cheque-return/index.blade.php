@extends('layout.app')
@section('title', 'عودت چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'عودت چک', 'url' => url()->current()]],
    ])

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <span>عودت چک</span>
            </div>
        </div>
    </div>
@endsection
