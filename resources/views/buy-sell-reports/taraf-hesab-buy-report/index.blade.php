@extends('layout.app')
@section('title', 'گزارش آماری خرید بر اساس طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش آماری خرید بر اساس طرف حساب', 'url' => url()->current()]],
    ])
@endsection
