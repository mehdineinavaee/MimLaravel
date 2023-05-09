@extends('layout.app')
@section('title', 'موجودی کالاها به تفکیک انبار')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'موجودی کالاها به تفکیک انبار', 'url' => url()->current()]],
    ])
@endsection
