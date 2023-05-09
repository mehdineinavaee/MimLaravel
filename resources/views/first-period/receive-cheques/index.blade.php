@extends('layout.app')
@section('title', 'چک های دریافتی اول دوره')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'چک های دریافتی اول دوره', 'url' => url()->current()]],
    ])
@endsection
