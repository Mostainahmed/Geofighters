<div class="modal fade" id="modal_phone_stock">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Add New Phone Model</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_add_new_stock" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">

                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="rsm">Phone Model<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_id_phone_model_for_stock"
                                name="phone_id" required="">
                                <option value="">Please Select</option>
                                <?php foreach ($phone_list as $row) { ?>
                                <option id="phone_id" value="<?php echo $row['phone_id']; ?>">
                                    <?php echo $row['phone_model']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="mobiledata">Stock<span style="color: red;">*</span>:</label>
                            <input type="number" class="form-control form-control-sm" id="txt_phone_model_stock"
                                name="stock" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="mobiledata">Date<span style="color: red;">*</span>:</label>
                            <input type="date" class="form-control form-control-sm" id="date_of_stock" name="stock_date"
                                required="">
                        </div>
                    </div>


                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" style="float:right" onClick="" class="btn btn-primary button-sm">Add
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
<script>
function view_add_phone_model_stock() {
    $('#modal_phone_stock').modal('show');
}
$('#frm_add_new_stock').on('submit', function(e) {
    e.preventDefault();
    var frm_add_new_stock = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    console.log(frm_add_new_stock);
    //return;

    Swal.fire({
        title: 'Do you want to add this Phone?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        allowOutsideClick: false,
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Please Wait...',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            $.ajax({
                url: "<?php echo base_url() ?>phone/add_stock_model_wise",
                method: "POST",
                data: frm_add_new_stock,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'New Stock added Successfully',
                            type: 'success',
                        }).then((data) => {
                            location.reload();
                        });
                    } else if (data == 403) {
                        accessDenied();
                    } else if (data == 440) {
                        sessionExpired();
                    } else {
                        somethingWentWrong();
                    }
                },
                error: function(data) {
                    // console.log(data);
                    somethingWentWrong();
                }
            });
        }
    });
});
</script>