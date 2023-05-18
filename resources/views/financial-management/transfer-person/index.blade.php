@extends('layout.app')
@section('title', 'انتقال بین اشخاص')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'انتقال بین اشخاص', 'url' => url()->current()]],
    ])
@endsection
