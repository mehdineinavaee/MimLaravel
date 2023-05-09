@extends('layout.app')
@section('title', 'گزارش دسته چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش دسته چک', 'url' => url()->current()]],
    ])
@endsection
