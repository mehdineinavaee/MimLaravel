@extends('layout.app')
@section('title', 'انتقال بین انبارها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'انتقال بین انبارها', 'url' => url()->current()]],
    ])
@endsection
