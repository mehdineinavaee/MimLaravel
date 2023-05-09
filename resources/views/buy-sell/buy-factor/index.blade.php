@extends('layout.app')
@section('title', 'فاکتور خرید')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور خرید', 'url' => url()->current()]],
    ])
@endsection
