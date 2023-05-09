@extends('layout.app')
@section('title', 'گزارش دوره ای خرید و فروش')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش دوره ای خرید و فروش', 'url' => url()->current()]],
    ])
@endsection
