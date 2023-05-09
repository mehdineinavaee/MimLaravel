@extends('layout.app')
@section('title', 'عملیات چک های پرداختی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'عملیات چک های پرداختی', 'url' => url()->current()]],
    ])
@endsection
