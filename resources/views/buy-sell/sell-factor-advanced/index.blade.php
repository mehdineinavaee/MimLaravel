@extends('layout.app')
@section('title', 'پیش فاکتور فروش')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پیش فاکتور فروش', 'url' => url()->current()]],
    ])
@endsection
