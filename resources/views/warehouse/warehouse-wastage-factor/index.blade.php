@extends('layout.app')
@section('title', 'فاکتور ضایعات')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'فاکتور ضایعات', 'url' => url()->current()]],
    ])
@endsection
