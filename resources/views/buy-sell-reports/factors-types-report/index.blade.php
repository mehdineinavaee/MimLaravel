@extends('layout.app')
@section('title', 'گزارش انواع فاکتورها (چاپ دسته ای فاکتورها)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش انواع فاکتورها (چاپ دسته ای فاکتورها)', 'url' => url()->current()]],
    ])
@endsection
