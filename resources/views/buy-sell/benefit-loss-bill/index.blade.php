@extends('layout.app')
@section('title', 'صورت حساب سود و زیان')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'صورت حساب سود و زیان', 'url' => url()->current()]],
    ])
@endsection
