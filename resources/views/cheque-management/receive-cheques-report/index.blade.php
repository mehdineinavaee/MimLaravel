@extends('layout.app')
@section('title', 'گزارش چک های دریافتی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش چک های دریافتی', 'url' => url()->current()]],
    ])
@endsection
