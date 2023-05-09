@extends('layout.app')
@section('title', 'سود به تفکیک کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'سود به تفکیک کالاها', 'url' => url()->current()]],
    ])
@endsection
