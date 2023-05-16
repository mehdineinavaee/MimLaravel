@extends('layout.app')
@section('title', 'گروه بندی طرف های حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گروه بندی طرف های حساب', 'url' => url()->current()]],
    ])

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-body bg-light"
                style="border-radius: 10px; background-color: #fff !important; padding: 20px; max-height:500px; overflow: auto;">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" id="category" method="POST" action="{{ route('taraf-hesab-group.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label>عنوان</label>
                                <input type="text" id="title" name="title" value="" class="form-control">
                                @if ($errors->has('title'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <label for="parent_id">نام شهر</label>
                                <select id="parent_id" name="parent_id" class="form-control select2" style="width: 100%;">
                                    <option value="0" selected>گروه را انتخاب کنید</option>
                                    @foreach ($allCategories as $rows)
                                        <option value="{{ $rows->id }}">{{ $rows->title }}</option>
                                    @endforeach
                                </select>
                                <div id="parent_id_error" class="invalid-feedback"></div>
                            </div>

                            {{-- <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                                <label>گروه</label>
                                <select id="parent_id" name="parent_id" class="form-control">
                                    <option value="0">عنوان گروه را انتخاب کنید</option>
                                    @foreach ($allCategories as $rows)
                                        <option value="{{ $rows->id }}">{{ $rows->title }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('parent_id'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                @endif
                            </div> --}}

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">تأیید</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <ul id="tree1">
                            @foreach ($categories as $category)
                                <li>
                                    {{ $category->title }}

                                    @if (count($category->childs))
                                        @include('taarife-payeh.taraf-hesab-group.manageChild', [
                                            'childs' => $category->childs,
                                        ])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />

@endsection
