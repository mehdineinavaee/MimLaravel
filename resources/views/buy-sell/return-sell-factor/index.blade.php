@extends('layout.app')
@section('title', 'فاکتور برگشت از فروش')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور برگشت از فروش', 'url' => url()->current()]],
    ])
@endsection
