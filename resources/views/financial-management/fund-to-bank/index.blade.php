@extends('layout.app')
@section('title', 'از صندوق به بانک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'از صندوق به بانک', 'url' => url()->current()]],
    ])
@endsection
