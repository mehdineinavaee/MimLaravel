@extends('layout.app')
@section('title', 'معرفی گروه اصلی و فرعی کالا')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی گروه اصلی و فرعی کالا', 'url' => url()->current()]],
    ])

@endsection
