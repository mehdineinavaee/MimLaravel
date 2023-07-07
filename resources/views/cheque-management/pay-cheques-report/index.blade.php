@extends('layout.app')
@section('title', 'گزارش چک های پرداختی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش چک های پرداختی', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <h4 class="font-weight-bold" style="color:blue">وضعیت چک</h4>
                    </div>
                    <h5 class="row pt-4">
                        <div class="row col-lg-12 col-md-12 col-sm-12" style="margin-right: 2rem;">
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_not_received">
                                    <input class="form-check-input" type="checkbox" name="index_chk_not_received"
                                        id="index_chk_not_received">
                                    چک های وصول نشده
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_received">
                                    <input class="form-check-input" type="checkbox" name="index_chk_received"
                                        id="index_chk_received">
                                    چک های وصول شده
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_returning_cheques">
                                    <input class="form-check-input" type="checkbox" name="index_chk_returning_cheques"
                                        id="index_chk_returning_cheques">
                                    چک های برگشتی
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_took_back">
                                    <input class="form-check-input" type="checkbox" name="index_chk_took_back"
                                        id="index_chk_took_back">
                                    چک های پس گرفته شده
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_revoke">
                                    <input class="form-check-input" type="checkbox" name="index_chk_revoke"
                                        id="index_chk_revoke">
                                    چک های ابطالی
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_not_issued">
                                    <input class="form-check-input" type="checkbox" name="index_chk_not_issued"
                                        id="index_chk_not_issued">
                                    چک های صادر نشده
                                </label>
                            </div>
                        </div>
                    </h5>
                </div>
                <br />
                <h6 class="bg-light" style="border-radius: 10px; padding: 1rem;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <h4 class="font-weight-bold" style="color:blue">شروط</h4>
                    </div>
                    <div class="row m-2">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_from_cheque_no">شماره چک از</label>
                                <input type="text" id="index_from_cheque_no" name="index_from_cheque_no"
                                    class="form-control" autocomplete="off" />
                                <div id="index_from_cheque_no_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_cheque_no">شماره چک تا</label>
                                <input type="text" id="index_to_cheque_no" name="index_to_cheque_no" class="form-control"
                                    autocomplete="off" />
                                <div id="index_to_cheque_no_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_account">حساب</label>
                                <select id="index_account" name="index_account" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>حساب را انتخاب کنید</option>
                                    {{-- @foreach ($investors as $investor) --}}
                                    <option value=1>
                                        حساب ها
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="index_payer_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_receiver">دریافت کننده چک</label>
                                <select id="index_receiver" name="index_receiver" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>دریافت کننده را انتخاب کنید</option>
                                    {{-- @foreach ($investors as $investor) --}}
                                    <option value=1>
                                        اسامی دریافت کننده ها
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="index_receiver_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_from_issuing_date">تاریخ صدور از</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_from_issuing_date" name="index_from_issuing_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_from_issuing_date_error" class="invalid-feedback"
                                        style="margin-right:38px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_issuing_date">تاریخ صدور تا</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_to_issuing_date" name="index_to_issuing_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_to_issuing_date_error" class="invalid-feedback"
                                        style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_from_due_date">تاریخ سر رسید از</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_from_due_date" name="index_from_due_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_from_due_date_error" class="invalid-feedback"
                                        style="margin-right:38px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_due_date">تاریخ سر رسید تا</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_to_due_date" name="index_to_due_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_to_due_date_error" class="invalid-feedback"
                                        style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_from_receipt_date">تاریخ وصول از</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_from_receipt_date" name="index_from_receipt_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_from_receipt_date_error" class="invalid-feedback"
                                        style="margin-right:38px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_receipt_date">تاریخ وصول تا</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_to_receipt_date" name="index_to_receipt_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_to_receipt_date_error" class="invalid-feedback"
                                        style="margin-right:38px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_from_total">مبلغ از</label>
                                <input type="text" id="index_from_total" name="index_from_total" class="form-control"
                                    autocomplete="off" onkeyup="separateNum(this.value,this,'index_from_total_price');" />
                                <div id="index_from_total_error" class="invalid-feedback"></div>
                                <div id="index_from_total_price" style="text-align: justify; color:green">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_total">مبلغ تا</label>
                                <input type="text" id="index_to_total" name="index_to_total" class="form-control"
                                    autocomplete="off" onkeyup="separateNum(this.value,this,'index_to_total_price');" />
                                <div id="index_to_total_error" class="invalid-feedback"></div>
                                <div id="index_to_total_price" style="text-align: justify; color:green">
                                </div>
                            </div>
                        </div>
                    </div>
                </h6>
                <br />
                <button type="button" class="btn btn-success showInTable" data-toggle="modal"
                    data-target="#createInfo">
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
                        <th style="min-width: 100px">شماره چک</th>
                        <th style="min-width: 200px">مبلغ</th>
                        <th style="min-width: 200px">تاریخ صدور</th>
                        <th style="min-width: 100px">سر رسید</th>
                        <th style="min-width: 300px">نام حساب</th>
                        <th style="min-width: 300px">دریافت کننده چک</th>
                        <th style="min-width: 200px">تاریخ وصول</th>
                        <th style="min-width: 200px">وضعیت چک</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <th>ردیف</th>
                    <th>شماره چک</th>
                    <th>مبلغ</th>
                    <th>تاریخ صدور</th>
                    <th>سر رسید</th>
                    <th>نام حساب</th>
                    <th>دریافت کننده چک</th>
                    <th>تاریخ وصول</th>
                    <th>وضعیت چک</th>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
