<!-- Modal -->
<div class="modal fade" id="turnoverInfo" data-backdrop="static" data-keyboard="false" aria-labelledby="turnoverInfoLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="turnoverInfoLabel">گردش حساب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="modal-body">
                <input type="hidden" id="turnover_taraf_hesab_id">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="turnover_fullname">طرف حساب</label>
                            <input type="text" id="turnover_fullname" name="turnover_fullname" class="form-control"
                                autocomplete="off" disabled />
                            <div id="turnover_fullname_error" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="turnover_form_date">از تاریخ</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="turnover_form_date" name="turnover_form_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="turnover_form_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="turnover_to_date">تا تاریخ</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" id="turnover_to_date" name="turnover_to_date"
                                    class="leftToRight rightAlign inputMaskDate form-control" autocomplete="off" />
                                <div id="turnover_to_date_error" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="button" class="btn btn-primary turnoverTarafHesab">تأیید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).on('click', '.turnover', function(e) {
            e.preventDefault();
            var turnover_taraf_hesab_id = $(this).val();
            // console.log(turnover_taraf_hesab_id);

            $.ajax({
                type: "GET",
                url: "/taraf-hesab/" + turnover_taraf_hesab_id,
                success: function(response) {
                    // console.log(response);
                    if (response.status == 404) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: 'متأسفانه خطایی رخ داده است، لطفاً چند لحظه دیگر امتحان کنید',
                        })
                    } else {
                        $("#turnoverInfo").modal("show");

                        $("#turnover_taraf_hesab_id").val(turnover_taraf_hesab_id);
                        $('#turnover_fullname').val(response.taraf_hesab.fullname);
                    }
                },
            });
        });
    </script>
@endpush
