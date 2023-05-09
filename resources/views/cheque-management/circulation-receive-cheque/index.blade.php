@extends('layout.app')
@section('title', 'سابقه گردش چک دریافتی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'سابقه گردش چک دریافتی', 'url' => url()->current()]],
    ])
@endsection
