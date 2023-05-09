@extends('layout.app')
@section('title', 'معرفی پرسنل')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی پرسنل', 'url' => url()->current()]],
    ])
@endsection
