@extends('layout.app')
@section('title', 'اول دوره صندوق')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'اول دوره صندوق', 'url' => url()->current()]],
    ])
@endsection
