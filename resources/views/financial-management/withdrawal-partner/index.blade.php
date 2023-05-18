@extends('layout.app')
@section('title', 'برداشت شرکا')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'برداشت شرکا', 'url' => url()->current()]],
    ])
@endsection
