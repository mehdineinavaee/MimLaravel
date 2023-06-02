@extends('layout.app')
@section('title', 'چاپ بارکد کالاها')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'چاپ بارکد کالاها', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank">
                    <i class="fa-lg fa fa-print" title="چاپ بارکد کالاها" data-toggle="tooltip"></i>
                    <br />
                    چاپ بارکد کالاها
                </a>
            </h3>
        </div>
    </div>
@endsection
