@extends('layout.app')
@section('title', 'دریافت / پرداخت')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'دریافت / پرداخت', 'url' => url()->current()]],
    ])
@endsection
