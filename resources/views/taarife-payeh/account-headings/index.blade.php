@extends('layout.app')
@section('title', 'معرفی سرفصل های حساب (کل، معین، تفصیل)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی سرفصل های حساب (کل، معین، تفصیل)', 'url' => url()->current()]],
    ])
@endsection
