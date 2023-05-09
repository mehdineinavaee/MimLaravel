@extends('layout.app')
@section('title', 'گزارش خرید به تفکیک ماه، فصل، سال')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش خرید به تفکیک ماه، فصل، سال', 'url' => url()->current()]],
    ])
@endsection
