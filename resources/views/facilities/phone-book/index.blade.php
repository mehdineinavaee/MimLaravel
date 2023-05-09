@extends('layout.app')
@section('title', 'دفترچه تلفن')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'دفترچه تلفن', 'url' => url()->current()]],
    ])
@endsection
