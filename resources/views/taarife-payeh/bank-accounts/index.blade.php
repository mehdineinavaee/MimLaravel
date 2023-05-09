@extends('layout.app')
@section('title', 'معرفی حساب های بانکی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی حساب های بانکی', 'url' => url()->current()]],
    ])
@endsection
