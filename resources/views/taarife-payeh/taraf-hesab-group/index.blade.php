@extends('layout.app')
@section('title', 'گروه بندی طرف های حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گروه بندی طرف های حساب', 'url' => url()->current()]],
    ])
@endsection
