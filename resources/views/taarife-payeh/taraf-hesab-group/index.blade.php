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
                        <div class="form-group mb-3">
                            <label for="title">عنوان</label>
                            <input type="text" id="title" name="title" class="form-control" autocomplete="off" />
                            <div id="title_error" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="parent_id">نام گروه</label>
                            <select id="parent_id" name="parent_id" class="form-control select2" style="width: 100%;">
                                <option value="" selected>گروه را انتخاب کنید</option>
                                @foreach ($allCategories as $rows)
                                    <option value="{{ $rows->id }}">{{ $rows->title }}</option>
                                @endforeach
                            </select>
                            <div id="parent_id_error" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success addTarafHesabGroup">ثبت</button>
                        </div>
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

@push('js')
    <script>
        fetchData();

        function fetchData() {
            const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "/taraf-hesab-group",
                type: "get",
                data: {
                    CSRF_TOKEN
                },
                success: function(response) {
                    // console.log(response);
                    $("#data").html(response);
                }
            })
        }

        $(document).ready(function() {
            $(document).on('click', '.addTarafHesabGroup', function(e) {
                e.preventDefault();
                var data = {
                    'title': $('#title').val(),
                    'parent_id': $('#parent_id').val(),
                }
                // console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/taraf-hesab-group",
                    data: data,
                    dataType: "json",

                    success: function(response) {
                        if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'خطا',
                                text: response.message,
                            })
                        } else {
                            Swal.fire(
                                    response.message,
                                    response.status,
                                    'success'
                                )
                                .then(() => {
                                    clearErrors();
                                    fetchData();
                                    $(parent_id).prop('selectedIndex', 0).change();
                                    $("#title").val(""); // Clear Input Values
                                });
                        }
                    },

                    error: function(errors) {
                        clearErrors();
                        $.each(errors.responseJSON.errors, function(key, err_values) {
                            // console.log(key);
                            // console.log(err_values);
                            $("#" + key + "_error").text(err_values[0]);
                            $("#" + key).addClass("is-invalid");
                        });
                    }
                });
            });
        });

        function clearErrors() {
            $("#title_error").text("");
            $("#title").removeClass("is-invalid");
            $("#parent_id_error").text("");
            $("#parent_id").removeClass("is-invalid");
        }
    </script>
@endpush
