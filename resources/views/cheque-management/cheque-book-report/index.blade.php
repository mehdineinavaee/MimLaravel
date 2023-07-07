@extends('layout.app')
@section('title', 'گزارش دسته چک')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش دسته چک', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <div class="tabs active" id="index_tab01">
                            <h6 class="font-weight-bold">شروط</h6>
                        </div>
                    </div>
                    <div class="line"></div>
                    <fieldset class="show" id="index_tab011">
                        <h6 class="row pt-4">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_accounting_details">مشخصات حساب</label>
                                    <select id="index_accounting_details" name="index_accounting_details"
                                        class="form-control select2" style="width: 100%;">
                                        <option value="" selected>کلیه مشخصات حساب</option>
                                        {{-- @foreach ($cities as $city) --}}
                                        <option value="1">
                                            کلیه حساب ها
                                        </option>
                                        {{-- @endforeach --}}
                                    </select>
                                    <div id="index_accounting_details_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_from_date">دریافت دسته چک از تاریخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" id="index_from_date" name="index_from_date"
                                            class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                        <div id="index_from_date_error" class="invalid-feedback" style="margin-right:38px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_to_date">دریافت دسته چک تا تاریخ</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input type="text" id="index_to_date" name="index_to_date"
                                            class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                        <div id="index_to_date_error" class="invalid-feedback" style="margin-right:38px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_from_cheque_code">کد دسته چک از</label>
                                    <input type="text" id="index_from_cheque_code" name="index_from_cheque_code"
                                        class="form-control" autocomplete="off" />
                                    <div id="index_from_cheque_code_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group mb-3">
                                    <label for="index_to_cheque_code">کد دسته چک تا</label>
                                    <input type="text" id="index_to_cheque_code" name="index_to_cheque_code"
                                        class="form-control" autocomplete="off" />
                                    <div id="index_to_cheque_code_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </h6>
                    </fieldset>
                </div>
                <br />
                <button type="button" class="btn btn-success showInTable" data-toggle="modal" data-target="#createInfo">
                    <span data-toggle="tooltip" title="جستجو">
                        <i class="fa-lg fa fa-search"></i>
                        <br />
                        نمایش در جدول
                    </span>
                </button>
                <a href={{ route('tarafHesabPDF') }} class="btn btn-info" target="_blank" title="گزارش گیری"
                    data-toggle="tooltip">
                    <i class="fa-lg fa fa-print"></i>
                    <br />
                    پیش نمایش و چاپ
                </a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 200px">کد دسته چک</th>
                        <th style="min-width: 200px">دریافت دسته چک</th>
                        <th style="min-width: 300px">مشخصات حساب بانکی</th>
                        <th style="min-width: 100px">تعداد برگه</th>
                        <th style="min-width: 100px">از</th>
                        <th style="min-width: 100px">تا</th>
                        <th style="min-width: 200px">پرداخت شده</th>
                        <th style="min-width: 100px">وصول شده</th>
                        <th style="min-width: 100px">برگشتی</th>
                        <th style="min-width: 100px">پس گرفته</th>
                        <th style="min-width: 100px">ابطالی</th>
                        <th style="min-width: 100px">صادر نشده</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>مجموع</th>
                        <th>18</th>
                        <th></th>
                        <th></th>
                        <th>15</th>
                        <th>3</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <br />
            <table class="table-responsive table table-hover table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr style="background-color: azure; color: blue;">
                        <th colspan="9">جزئیات دسته چک انتخاب شده</th>
                    </tr>
                    <tr>
                        <th style="min-width: 100px">ردیف</th>
                        <th style="min-width: 100px">شماره چک</th>
                        <th style="min-width: 200px">وضعیت</th>
                        <th style="min-width: 100px">کد ارجاع</th>
                        <th style="min-width: 200px">تاریخ عملیات</th>
                        <th style="min-width: 100px">مبلغ</th>
                        <th style="min-width: 200px">دریافت کننده</th>
                        <th style="min-width: 100px">تاریخ صدور</th>
                        <th style="min-width: 100px">سر رسید</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>684,000,000</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
