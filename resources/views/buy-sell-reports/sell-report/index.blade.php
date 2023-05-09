@extends('layout.app')
@section('title', 'گزارش فروش به تفکیک ماه، فصل، سال')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش فروش به تفکیک ماه، فصل، سال', 'url' => url()->current()]],
    ])
@endsection
