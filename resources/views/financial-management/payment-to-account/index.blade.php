@extends('layout.app')
@section('title', 'پرداخت به طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پرداخت به طرف حساب', 'url' => url()->current()]],
    ])
@endsection
