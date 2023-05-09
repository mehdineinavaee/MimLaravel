@extends('layout.app')
@section('title', 'سود به تفکیک طرف های حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'سود به تفکیک طرف های حساب', 'url' => url()->current()]],
    ])
@endsection
