@extends('layout.app')
@section('title', 'سابقه گردش چک پرداختی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'سابقه گردش چک پرداختی', 'url' => url()->current()]],
    ])
@endsection
