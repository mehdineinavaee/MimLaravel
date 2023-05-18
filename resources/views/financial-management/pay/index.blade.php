@extends('layout.app')
@section('title', 'پرداخت هزینه')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'پرداخت هزینه', 'url' => url()->current()]],
    ])
@endsection
