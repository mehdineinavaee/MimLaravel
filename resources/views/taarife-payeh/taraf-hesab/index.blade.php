@extends('layout.app')
@section('title', 'معرفی طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی طرف حساب', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus" title="افزودن طرف حساب" data-toggle="tooltip"></i>
                    <br />
                    جدید
                </button>
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank">
                    <i class="fa-lg fa fa-file" title="فهرست طرف های حساب" data-toggle="tooltip"></i>
                    <br />
                    فهرست
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table-responsive table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>فروشنده</th>
                        <th>خریدار</th>
                        <th style="min-width: 90px">واسطه فروش</th>
                        <th style="min-width: 90px">سرمایه گذار</th>
                        <th style="min-width: 90px">بد حساب</th>
                        <th style="min-width: 60px">فعال</th>
                        <th style="min-width: 150px">انتقال به دفترچه تلفن</th>
                        <th style="min-width: 50px">کد</th>
                        <th style="min-width: 120px">نام و نام خانوادگی</th>
                        <th style="min-width: 90px">کد پستی</th>
                        <th>موبایل</th>
                        <th style="min-width: 90px">شهر</th>
                        <th style="min-width: 120px">واسطه فروش</th>
                        <th style="min-width: 100px">پور سانت</th>
                        <th style="min-width: 400px">آدرس</th>
                        <th style="min-width: 240px">نوع شخص</th>
                        <th style="min-width: 120px">مدیر عامل</th>
                        <th>کد ملی</th>
                        <th style="min-width: 80px">تاریخ تولد</th>
                        <th style="min-width: 120px">شغل</th>
                        <th>فاکس</th>
                        <th>تلفن</th>
                        <th style="min-width: 80px">نوع فعالیت</th>
                        <th style="min-width: 80px">کد اقتصادی</th>
                        <th style="min-width: 130px">ایمیل</th>
                        <th style="min-width: 130px">وب سایت</th>
                        <th style="min-width: 120px">سقف اعتبار</th>
                        <th style="min-width: 100px">فقط هشداری</th>
                        <th style="min-width: 90px">منع فروش</th>
                        <th style="min-width: 130px">چک های پاس نشده</th>
                        <th style="min-width: 100px">مانده مشتری</th>
                        <th style="min-width: 140px">چک های خرج نشده</th>
                        <th style="min-width: 180px"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>فروشنده</th>
                        <th>خریدار</th>
                        <th>واسطه فروش</th>
                        <th>سرمایه گذار</th>
                        <th>بد حساب</th>
                        <th>فعال</th>
                        <th>انتقال به دفترچه تلفن</th>
                        <th>کد</th>
                        <th>نام و نام خانوادگی</th>
                        <th>کد پستی</th>
                        <th>موبایل</th>
                        <th>شهر</th>
                        <th>واسطه فروش</th>
                        <th>پور سانت</th>
                        <th>آدرس</th>
                        <th>نوع شخص</th>
                        <th>مدیر عامل</th>
                        <th>کد ملی</th>
                        <th>تاریخ تولد</th>
                        <th>شغل</th>
                        <th>فاکس</th>
                        <th>تلفن</th>
                        <th>نوع فعالیت</th>
                        <th>کد اقتصادی</th>
                        <th>ایمیل</th>
                        <th>وب سایت</th>
                        <th>سقف اعتبار</th>
                        <th>فقط هشداری</th>
                        <th>منع فروش</th>
                        <th>چک های پاس نشده</th>
                        <th>مانده مشتری</th>
                        <th>چک های خرج نشده</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.taraf-hesab.create')
    @include('taarife-payeh.taraf-hesab.edit')
    @include('taarife-payeh.taraf-hesab.show')
    @include('common.delete')
@endsection

@push('js')
    <script>
        fetchTarafHesab();

        function fetchTarafHesab() {
            $.ajax({
                type: "GET",
                url: "/fetch-taraf-hesab",
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    $("tbody").html("");
                    $.each(response.taraf_hesabs, function(index, item) {
                        $("tbody").append(
                            "<tr>\
                                                                <td>" +
                            (index + 1) +
                            "</td>\
                                                                <td>" +
                            item.chk_seller +
                            "</td>\
                                                                <td>" +
                            item.chk_buyer +
                            "</td>\
                                                                <td>" +
                            item.chk_broker +
                            "</td>\
                                                                <td>" +
                            item.chk_investor +
                            "</td>\
                                                                <td>" +
                            item.chk_block_list +
                            "</td>\
                                                                <td>" +
                            item.chk_active +
                            "</td>\
                                                                <td>" +
                            item.chk_move_phone +
                            "</td>\
                                                                <td>" +
                            item.code +
                            "</td>\
                                                                <td>" +
                            item.fullname +
                            "</td>\
                                                                <td>" +
                            item.zip_code +
                            "</td>\
                                                                <td>" +
                            item.phone +
                            "</td>\
                                                                <td>" +
                            item.city +
                            "</td>\
                                                                <td>" +
                            item.broker +
                            "</td>\
                                                                <td>" +
                            item.commission +
                            "</td>\
                                                                <td>" +
                            item.address +
                            "</td>\
                                                                <td>" +
                            item.person_type +
                            "</td>\
                                                                <td>" +
                            item.ceo_fullname +
                            "</td>\
                                                                <td>" +
                            item.national_code +
                            "</td>\
                                                                <td>" +
                            item.birthdate +
                            "</td>\
                                                                <td>" +
                            item.occupation +
                            "</td>\
                                                                <td>" +
                            item.fax +
                            "</td>\
                                                                <td>" +
                            item.tel +
                            "</td>\
                                                                <td>" +
                            item.activity_type +
                            "</td>\
                                                                <td>" +
                            item.economic_code +
                            "</td>\
                                                                <td>" +
                            item.email +
                            "</td>\
                                                                <td>" +
                            item.website +
                            "</td>\
                                                                <td>" +
                            new Intl.NumberFormat().format(item.credit_limit) +
                            " ریال" +
                            "</td>\
                                                                <td>" +
                            item.opt_warning +
                            "</td>\
                                                                <td>" +
                            item.opt_prohibition_sale +
                            "</td>\
                                                                <td>" +
                            item.opt_uncleared +
                            "</td>\
                                                                <td>" +
                            item.opt_customer_balance +
                            "</td>\
                                                                <td>" +
                            item.not_spent +
                            '</td>\
                                                        <td style="text-align: center"><button type="button" value="' +
                            item.id +
                            '" class="edit_taraf_hesab btn btn-primary btn-sm"><i class="fa fa-pencil text-light" title="ویرایش" data-toggle="tooltip"></i></button>\
                                                        <button type="button" value="/taraf-hesab/' +
                            item.id +
                            '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash" title="حذف" data-toggle="tooltip"></i></button>\
                                                        <button type="button" value="' +
                            item.id +
                            '" class="turnover btn btn-primary btn-sm"><i class="fa fa-money text-light" title="گردش حساب" data-toggle="tooltip"></i></button>\
                                                        <button type="button" value="' +
                            item.id +
                            '" class="address_print btn btn-primary btn-sm"><i class="fa fa-print" title="چاپ آدرس" data-toggle="tooltip"></i></button>\
                                                                </tr>'
                        );
                    });
                },
            });
        }

        $(document).on('click', '.address_print', function(e) {
            e.preventDefault();
            var address_print_id = $(this).val();
            // console.log(address_print_id);

            $.ajax({
                type: "GET",
                url: "/address-print-pdf/" + address_print_id,
            });
        });
    </script>
@endpush
