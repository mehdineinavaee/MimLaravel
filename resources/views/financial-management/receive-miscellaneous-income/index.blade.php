@extends('layout.app')
@section('title', 'دریافت درآمد متفرقه')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'دریافت درآمد متفرقه', 'url' => url()->current()]],
    ])
@endsection
