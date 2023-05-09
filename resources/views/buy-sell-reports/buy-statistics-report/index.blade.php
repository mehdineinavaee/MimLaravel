@extends('layout.app')
@section('title', 'گزارش آماری خرید بر اساس کالا')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش آماری خرید بر اساس کالا', 'url' => url()->current()]],
    ])
@endsection
