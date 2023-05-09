@extends('layout.app')
@section('title', 'نقطه سفارش کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'نقطه سفارش کالاها', 'url' => url()->current()]],
    ])
@endsection
