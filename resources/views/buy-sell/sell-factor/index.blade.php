@extends('layout.app')
@section('title', 'فاکتور فروش')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور فروش', 'url' => url()->current()]],
    ])
@endsection
