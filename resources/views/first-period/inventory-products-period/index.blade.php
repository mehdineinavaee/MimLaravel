@extends('layout.app')
@section('title', 'موجودی اول دوره کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'موجودی اول دوره کالاها', 'url' => url()->current()]],
    ])
@endsection
