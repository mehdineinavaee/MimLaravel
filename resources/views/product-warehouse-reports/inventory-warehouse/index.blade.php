@extends('layout.app')
@section('title', 'موجودی کالاهای انبار')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'موجودی کالاهای انبار', 'url' => url()->current()]],
    ])
@endsection
