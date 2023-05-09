@extends('layout.app')
@section('title', 'سود به تفکیک فاکتورها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'سود به تفکیک فاکتورها', 'url' => url()->current()]],
    ])
@endsection
