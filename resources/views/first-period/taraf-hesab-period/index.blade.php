@extends('layout.app')
@section('title', 'اول دوره طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'اول دوره طرف حساب', 'url' => url()->current()]],
    ])
@endsection
