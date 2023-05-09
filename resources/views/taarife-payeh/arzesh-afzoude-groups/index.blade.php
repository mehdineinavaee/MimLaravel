@extends('layout.app')
@section('title', 'معرفی گروه های ارزش افزوده')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی گروه های ارزش افزوده', 'url' => url()->current()]],
    ])
@endsection
