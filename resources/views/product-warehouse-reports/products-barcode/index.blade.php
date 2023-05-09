@extends('layout.app')
@section('title', 'چاپ بارکد کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'چاپ بارکد کالاها', 'url' => url()->current()]],
    ])
@endsection
