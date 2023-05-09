@extends('layout.app')
@section('title', 'چک های پرداختی اول دوره')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'چک های پرداختی اول دوره', 'url' => url()->current()]],
    ])
@endsection
