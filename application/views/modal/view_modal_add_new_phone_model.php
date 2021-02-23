<div class="modal fade" id="modal_add_phone_model">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Add New Phone Model</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_add_new_phone_model" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">

                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="mobiledata">Phone Model<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_phone_model"
                                name="phone_model" required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="mobiledata">Base Price<span style="color: red;">*</span>:</label>
                            <input type="number" class="form-control form-control-sm" id="txt_phone_model_base_price"
                                name="base_price" required="">
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
function view_add_new_phone_model() {
    $('#modal_add_phone_model').modal('show');
}

$('#frm_add_new_phone_model').on('submit', function(e) {
    e.preventDefault();
    var frm_add_new_phone = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    console.log(frm_add_new_phone);
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
                url: "<?php echo base_url() ?>phone/add_new_phone_model",
                method: "POST",
                data: frm_add_new_phone,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'New Phone Added Successfully',
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