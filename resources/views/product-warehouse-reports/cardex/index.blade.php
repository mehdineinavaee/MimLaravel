@extends('layout.app')
@section('title', 'گردش کالا در انبار (کاردکس)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گردش کالا در انبار (کاردکس)', 'url' => url()->current()]],
    ])
@endsection
