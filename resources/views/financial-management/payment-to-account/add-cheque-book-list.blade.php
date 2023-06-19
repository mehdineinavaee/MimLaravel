<!-- Modal -->
<div class="modal fade" id="addChequeBookList" data-backdrop="static" data-keyboard="false"
    aria-labelledby="addChequeBookListLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"style="min-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addChequeBookListLabel">فهرست سریال چک</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="padding:0; margin: 0">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="min-height: 330px">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table id="addChequeBookListTable"
                            class="table-responsive table table-hover table-bordered table-striped"
                            style="text-align: center;">
                            <thead>
                                <tr>
                                    <th style="min-width: 100px">ردیف</th>
                                    <th style="min-width: 110px">کد دسته چک</th>
                                    <th style="min-width: 100px">شماره چک</th>
                                    <th style="min-width: 355px">مشخصات حساب بانکی</th>
                                    <th style="min-width: 80px">تعداد برگه</th>
                                    <th style="min-width: 100px">از سریال</th>
                                    <th style="min-width: 100px">تا سریال</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cheque_books as $item)
                                    @for ($i = 0; $i < $item->quantity; $i++)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->cheque_from + $i }}</td>
                                            <td>{{ $item->bank_account_details }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->cheque_from }}</td>
                                            <td>{{ $item->cheque_to }}</td>
                                        </tr>
                                    @endfor
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ردیف</th>
                                    <th>کد دسته چک</th>
                                    <th>شماره چک</th>
                                    <th>مشخصات حساب بانکی</th>
                                    <th>تعداد برگه</th>
                                    <th>از سریال</th>
                                    <th>تا سریال</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            {{-- <div class="modal-footer">

            </div> --}}
        </div>
    </div>
</div>
<!-- End Modal -->
@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#addChequeBookListTable').DataTable();
            $('#addChequeBookListTable tbody').on('dblclick', 'tr', function() {
                var row = table.row(this).data();
                // console.log(row);
                $("#addChequeBookList").modal("hide");
                $("#add_tab2_cheque_serial_number").val(row[2]);
                $("#add_tab2_bank_account_details").val(row[3]);
            });
        });
    </script>
@endpush
