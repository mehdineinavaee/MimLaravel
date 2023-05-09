@extends('layout.app')
@section('title', 'معرفی طرف حساب')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'معرفی طرف حساب', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createInfo">
                    <i class="fa-lg fa fa-plus"></i>
                    <br />
                    جدید
                </button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editInfo">
                    <i class="fa-lg fa fa-edit"></i>
                    <br />
                    تصحیح
                </button>
                <button type="button" class="btn btn-danger">
                    <i class="fa-lg fa fa-trash"></i>
                    <br />
                    حذف
                </button>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table-responsive table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>کد</th>
                        <th style="min-width: 200px">نام طرف حساب</th>
                        <th>تلفن</th>
                        <th>موبایل</th>
                        <th style="min-width: 200px">فروشنده</th>
                        <th style="min-width: 200px">خریدار</th>
                        <th style="min-width: 200px">واسطه</th>
                        <th style="min-width: 200px">سرمایه گذار</th>
                        <th style="min-width: 100px">بد حساب</th>
                        <th style="min-width: 400px">آدرس</th>
                        <th>فعال</th>
                        <th style="min-width: 100px">تاریخ معرفی</th>
                        <th>کد ملی</th>
                        <th style="min-width: 100px">کد اقتصادی</th>
                        <th>کد پستی</th>
                        <th>استان</th>
                        <th>شهر</th>
                        <th style="min-width: 200px">واسطه فروش</th>
                        <th style="min-width: 200px">پور سانت</th>
                        <th style="min-width: 100px">نوع شخص</th>
                        <th style="min-width: 200px">نام مدیرعامل</th>
                        <th style="min-width: 100px">تاریخ تولد</th>
                        <th style="min-width: 200px">شغل</th>
                        <th>فاکس</th>
                        <th style="min-width: 100px">پیش کد</th>
                        <th style="min-width: 100px">نوع فعالیت</th>
                        <th>ایمیل</th>
                        <th>وب سایت</th>
                        <th style="min-width: 150px">سقف اعتبار</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>100</td>
                        <td>جناب آقای مهدی نینوایی</td>
                        <td>02128586821</td>
                        <td>09191785593</td>
                        <td>تیک دارد</td>
                        <td>تیک ندارد</td>
                        <td>تیک دارد</td>
                        <td>تیک ندارد</td>
                        <td>خیر</td>
                        <td>یزد، شهرک دانشگاه، شرکت ایران اپ کو</td>
                        <td>بله</td>
                        <td>1401/01/11</td>
                        <td>4420095024</td>
                        <td>8102135281</td>
                        <td>8162502311</td>
                        <td>یزد</td>
                        <td>یزد</td>
                        <td>جناب آقای علی یزدی</td>
                        <td>100,000 تومان</td>
                        <td>حقیقی</td>
                        <td>جناب آقای جواد رحمتی</td>
                        <td>1368/11/01</td>
                        <td>برنامه نویس</td>
                        <td>02128524831</td>
                        <td>38001</td>
                        <td>آزاد</td>
                        <td>mehdi.neinavaee@gmail.com</td>
                        <td>https://mehdi.neinavaee.com</td>
                        <td>10,000,000,000 تومان</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>200</td>
                        <td>جناب آقای شاهین الماسی</td>
                        <td>02128586822</td>
                        <td>09353251912</td>
                        <td>تیک ندارد</td>
                        <td>تیک دارد</td>
                        <td>تیک ندارد</td>
                        <td>تیک دارد</td>
                        <td>بله</td>
                        <td>تهران، سعادت آباد، شرکت ایران اپ کو</td>
                        <td>خیر</td>
                        <td>1402/02/12</td>
                        <td>4420095022</td>
                        <td>8102135282</td>
                        <td>8162502312</td>
                        <td>تهران</td>
                        <td>تهران</td>
                        <td>جناب آقای حسن تهرانی</td>
                        <td>200,000 تومان</td>
                        <td>حقوقی</td>
                        <td>جناب آقای حسن رحمتی</td>
                        <td>1368/11/01</td>
                        <td>مدیر پروژه</td>
                        <td>02128524832</td>
                        <td>38002</td>
                        <td>دولتی</td>
                        <td>shahin.almasi@gmail.com</td>
                        <td>https://shahin.almasi.com</td>
                        <td>20,000,000,000 تومان</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ردیف</th>
                        <th>کد</th>
                        <th>نام طرف حساب</th>
                        <th>تلفن</th>
                        <th>موبایل</th>
                        <th>فروشنده</th>
                        <th>خریدار</th>
                        <th>واسطه</th>
                        <th>سرمایه گذار</th>
                        <th>بد حساب</th>
                        <th>آدرس</th>
                        <th>فعال</th>
                        <th>تاریخ معرفی</th>
                        <th>کد ملی</th>
                        <th>کد اقتصادی</th>
                        <th>کد پستی</th>
                        <th>استان</th>
                        <th>شهر</th>
                        <th>واسطه فروش</th>
                        <th>پور سانت</th>
                        <th>نوع شخص</th>
                        <th>نام مدیرعامل</th>
                        <th>تاریخ تولد</th>
                        <th>شغل</th>
                        <th>فاکس</th>
                        <th>پیش کد</th>
                        <th>نوع فعالیت</th>
                        <th>ایمیل</th>
                        <th>وب سایت</th>
                        <th>سقف اعتبار</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

    @include('taarife-payeh.taraf-hesab.create')
    @include('taarife-payeh.taraf-hesab.edit')
@endsection

@push('js')
    <script>
        $('#example1 tbody').on('dblclick', 'tr', function() {
            var table = $('#example1').DataTable();
            var rowData = table.row(this).data();
            console.log(rowData);
            $('#editInfo').modal('show');
            $("#edit_code").val(rowData[1]);
            $("#edit_fullname").val(rowData[2]);
            $("#tel").val(rowData[3]);
            $("#edit_phone").val(rowData[4]);
            // $("#").val(rowData[5]);
            // $("#").val(rowData[6]);
            // $("#").val(rowData[7]);
            // $("#").val(rowData[8]);
            // $("#").val(rowData[9]);
            $("#edit_address").val(rowData[10]);
            // $("#").val(rowData[11]);
            // $("#").val(rowData[12]);
            $("#edit_national_code").val(rowData[13]);
            $("#edit_economic_code").val(rowData[14]);
            $("#edit_zip_code").val(rowData[15]);
            // $("#").val(rowData[16]);
            $("#edit_city").val(rowData[17]);
            $("#edit_broker").val(rowData[18]);
            $("#edit_commission").val(rowData[19]);
            $("#edit_person_type").val(rowData[20]);
            $("#edit_ceo_fullname").val(rowData[21]);
            $("#edit_birthdate").val(rowData[22]);
            $("#edit_occupation").val(rowData[23]);
            $("#edit_fax").val(rowData[24]);
            // $("#").val(rowData[25]);
            $("#edit_activity_type").val(rowData[26]);
            $("#edit_email").val(rowData[27]);
            $("#edit_website").val(rowData[28]);
            $("#edit_credit_limit").val(rowData[29]);
        });
    </script>
@endpush
