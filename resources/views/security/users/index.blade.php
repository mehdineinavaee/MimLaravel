@extends('layout.app')
@section('title', 'لیست کاربران')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'لیست کاربران', 'url' => url()->current()]],
    ])
@endsection
