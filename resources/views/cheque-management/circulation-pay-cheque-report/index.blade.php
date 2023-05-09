@extends('layout.app')
@section('title', 'گزارش گردش چک پرداختی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش گردش چک پرداختی', 'url' => url()->current()]],
    ])
@endsection
