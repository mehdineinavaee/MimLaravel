@extends('layout.app')
@section('title', 'گزارشات فصلی دارایی (TTMS)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارشات فصلی دارایی (TTMS)', 'url' => url()->current()]],
    ])
@endsection
