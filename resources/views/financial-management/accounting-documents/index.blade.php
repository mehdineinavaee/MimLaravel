@extends('layout.app')
@section('title', 'اسناد حسابداری')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'اسناد حسابداری', 'url' => url()->current()]],
    ])
@endsection
