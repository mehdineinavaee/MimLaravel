@extends('layout.app')
@section('title', 'معرفی واحد شمارش کالا')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی واحد شمارش کالا', 'url' => url()->current()]],
    ])
@endsection
