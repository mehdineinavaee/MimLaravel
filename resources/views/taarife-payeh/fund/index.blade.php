@extends('layout.app')
@section('title', 'معرفی درآمد / هزینه / صندوق')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی درآمد / هزینه / صندوق', 'url' => url()->current()]],
    ])
@endsection
