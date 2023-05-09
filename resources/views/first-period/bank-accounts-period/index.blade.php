@extends('layout.app')
@section('title', 'اول دوره حساب های بانکی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'اول دوره حساب های بانکی', 'url' => url()->current()]],
    ])
@endsection
