@extends('layout.app')
@section('title', 'فاکتور برگشت از خرید')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور برگشت از خرید', 'url' => url()->current()]],
    ])
@endsection
