@extends('layout.app')
@section('title', 'معرفی شهرهای کشور')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی شهرهای کشور', 'url' => url()->current()]],
    ])
@endsection
