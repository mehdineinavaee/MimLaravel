@extends('layout.app')
@section('title', 'گزارش چک های دریافتی')
@section('content')
    @include('common.breadcrumbs', [
        'data' => [['title' => 'گزارش چک های دریافتی', 'url' => url()->current()]],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="bg-light" style="border-radius: 10px; padding: 1rem;">
                    <div class="row d-flex mx-1 mx-sm-3">
                        <h4 class="font-weight-bold" style="color:blue">آخرین وضعیت چک</h4>
                    </div>
                    <h5 class="row pt-4">
                        <div class="row col-lg-12 col-md-12 col-sm-12" style="margin-right: 2rem;">
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_fun">
                                    <input class="form-check-input" type="checkbox" name="index_chk_fun" id="index_chk_fun">
                                    چک های نزد صندوق
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_going_on">
                                    <input class="form-check-input" type="checkbox" name="index_chk_going_on"
                                        id="index_chk_going_on">
                                    چک های در جریان وصول
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_criticized">
                                    <input class="form-check-input" type="checkbox" name="index_chk_criticized"
                                        id="index_chk_criticized">
                                    چک های نقد شده
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_spent">
                                    <input class="form-check-input" type="checkbox" name="index_chk_spent"
                                        id="index_chk_spent">
                                    چک های خرج شده
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_returning_cheque">
                                    <input class="form-check-input" type="checkbox" name="index_chk_returning_cheque"
                                        id="index_chk_returning_cheque">
                                    چک های برگشتی
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_coming_back">
                                    <input class="form-check-input" type="checkbox" name="index_chk_coming_back"
                                        id="index_chk_coming_back">
                                    چک های عودتی
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_receive_guarantee">
                                    <input class="form-check-input" type="checkbox" name="index_chk_receive_guarantee"
                                        id="index_chk_receive_guarantee">
                                    چک های ضمانت دریافتی
                                </label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right">
                                <label class="form-check-label" for="index_chk_coming_back_guarantee">
                                    <input class="form-check-input" type="checkbox" name="index_chk_coming_back_guarantee"
                                        id="index_chk_coming_back_guarantee">
                                    چک های ضمانت عودتی
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
                                <label for="index_cheque_no">شماره چک شامل</label>
                                <input type="text" id="index_cheque_no" name="index_cheque_no" class="form-control"
                                    autocomplete="off" />
                                <div id="index_cheque_no_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_payer">پرداخت کننده چک</label>
                                <select id="index_payer" name="index_payer" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>پرداخت کننده را انتخاب کنید</option>
                                    {{-- @foreach ($investors as $investor) --}}
                                    <option value=1>
                                        اسامی پرداخت کننده ها
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="index_payer_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_receiver">گیرنده چک خرجی</label>
                                <select id="index_receiver" name="index_receiver" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>گیرنده را انتخاب کنید</option>
                                    {{-- @foreach ($investors as $investor) --}}
                                    <option value=1>
                                        اسامی گیرنده ها
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="index_receiver_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_place">محل خواباندن چک</label>
                                <select id="index_place" name="index_place" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="" selected>محل خواباندن چک را انتخاب کنید</option>
                                    {{-- @foreach ($investors as $investor) --}}
                                    <option value=1>
                                        محل خواباندن چک
                                    </option>
                                    {{-- @endforeach --}}
                                </select>
                                <div id="index_place_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_from_mark">پشت نمره از</label>
                                <input type="text" id="index_from_mark" name="index_from_mark" class="form-control"
                                    autocomplete="off" />
                                <div id="index_from_mark_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_mark">پشت نمره تا</label>
                                <input type="text" id="index_to_mark" name="index_to_mark" class="form-control"
                                    autocomplete="off" />
                                <div id="index_to_mark_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_from_receive_date">تاریخ دریافت چک از</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_from_receive_date" name="index_from_receive_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_from_receive_date_error" class="invalid-feedback"
                                        style="margin-right:38px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_receive_date">تاریخ دریافت چک تا</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_to_receive_date" name="index_to_receive_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_to_receive_date_error" class="invalid-feedback"
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
                                <label for="index_from_sleep_date">تاریخ به حساب خواباندن از</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_from_sleep_date" name="index_from_sleep_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_from_sleep_date_error" class="invalid-feedback"
                                        style="margin-right:38px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label for="index_to_sleep_date">تاریخ به حساب خواباندن تا</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text" id="index_to_sleep_date" name="index_to_sleep_date"
                                        class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                    <div id="index_to_sleep_date_error" class="invalid-feedback"
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
                        <th style="min-width: 100px">پشت نمره</th>
                        <th style="min-width: 100px">شماره چک</th>
                        <th style="min-width: 200px">مبلغ</th>
                        <th style="min-width: 100px">سر رسید</th>
                        <th style="min-width: 300px">مشخصات حساب</th>
                        <th style="min-width: 300px">پرداخت کننده چک</th>
                        <th style="min-width: 300px">گیرنده / محل خواباندن چک</th>
                        <th style="min-width: 200px">تاریخ دریافت</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr style="text-align: right;">
                        <th>تعداد:</th>
                        <th colspan="8">0</th>
                    </tr>
                    <tr style="text-align: right;">
                        <th>جمع کل:</th>
                        <th colspan="8">0,000</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
