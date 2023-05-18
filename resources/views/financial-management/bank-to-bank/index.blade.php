@extends('layout.app')
@section('title', 'بانک به بانک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'بانک به بانک', 'url' => url()->current()]],
    ])
@endsection
