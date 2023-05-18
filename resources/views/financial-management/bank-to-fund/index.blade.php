@extends('layout.app')
@section('title', 'از بانک به صندوق')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'از بانک به صندوق', 'url' => url()->current()]],
    ])
@endsection
