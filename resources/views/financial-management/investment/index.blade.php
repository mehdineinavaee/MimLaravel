@extends('layout.app')
@section('title', 'پرداخت شرکا (سرمایه گذاری)')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پرداخت شرکا (سرمایه گذاری)', 'url' => url()->current()]],
    ])
@endsection
