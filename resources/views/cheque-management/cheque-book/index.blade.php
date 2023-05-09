@extends('layout.app')
@section('title', 'معرفی دسته چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی دسته چک', 'url' => url()->current()]],
    ])
@endsection
