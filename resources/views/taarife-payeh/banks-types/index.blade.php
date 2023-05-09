@extends('layout.app')
@section('title', 'معرفی انواع بانک های کشور')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی انواع بانک های کشور', 'url' => url()->current()]],
    ])
@endsection
