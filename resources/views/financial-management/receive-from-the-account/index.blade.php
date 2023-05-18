@extends('layout.app')
@section('title', 'دریافت از طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'دریافت از طرف حساب', 'url' => url()->current()]],
    ])
@endsection
