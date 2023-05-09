<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">{{ $data[0]['title'] }}</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="/">صفحه اصلی</a></li>
                    @if (isset($data) && is_array($data))
                        @foreach ($data as $key => $value)
                            <li class="breadcrumb-item active">
                                <a href="{{ $value['url'] }}">{{ $value['title'] }}</a>
                                @if ($key != sizeof($data) - 1 || isset($_GET['trashed']))
                                    <span class="fa fa-angle-left"></span>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>
