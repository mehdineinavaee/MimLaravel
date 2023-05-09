@extends('layout.app')
@section('title', 'گزارش چک های پرداختی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش چک های پرداختی', 'url' => url()->current()]],
    ])
@endsection
