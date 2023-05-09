@extends('layout.app')
@section('title', 'عملیات چک های دریافتی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'عملیات چک های دریافتی', 'url' => url()->current()]],
    ])
@endsection
