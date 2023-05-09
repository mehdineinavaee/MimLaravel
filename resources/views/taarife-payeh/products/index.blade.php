@extends('layout.app')
@section('title', 'معرفی کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی کالاها', 'url' => url()->current()]],
    ])
@endsection
