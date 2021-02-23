<div class="modal fade" id="modal_vendor_update">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align:center">Add Vendor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_vendor_update" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group  col-lg-6 col-sm-6 ">
                                <label for="vendor">Vendor Code:</label>
                                <input type="text" class="form-control form-control-sm" id="txt_vendorcode_new_useless"
                                    name="vendor_code" required="" disabled>
                            </div>
                            <div class="form-group  col-lg-6 col-sm-6 " style="display:none;">
                                <label for="vendor">Vendor Code:</label>
                                <input type="text" class="form-control form-control-sm" id="txt_vendorcode_update"
                                    name="vendor_code">
                            </div>
                            <div class="form-group  col-lg-6 col-sm-6 ">
                                <label for="vendor">Vendor Name:</label>
                                <input type="text" class="form-control form-control-sm" id="txt_vendorname_update"
                                    name="vendor_name" required="">
                            </div>
                            <div class="form-group col-lg-6 col-sm-6 ">
                                <label for="vendor">Address:</label>
                                <input type="text" class="form-control form-control-sm" id="txt_vendoraddress_update"
                                    name="vendor_address" required="">
                            </div>
                            <div class="form-group col-lg-6 col-sm-6 ">
                                <label for="vendor">Phone:</label>
                                <input type="text" class="form-control form-control-sm" id="txt_vendorphone_update"
                                    name="vendor_phone" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function update_vendor(vendorcode) {
    selected_vendor_list = current_vendor_list.find(function(product) {
        return product.vendor_code == vendorcode;
    });

    //setting values from table to the form
    $('#txt_vendorcode_new_useless').val(selected_vendor_list['vendor_code']);
    $('#txt_vendorcode_update').val(selected_vendor_list['vendor_code']);
    $('#txt_vendorname_update').val(selected_vendor_list['vendor_name']);
    $('#txt_vendoraddress_update').val(selected_vendor_list['vendor_address']);
    $('#txt_vendorphone_update').val(selected_vendor_list['vendor_phone']);

    $('#modal_vendor_update').modal('show');
}
$('#frm_vendor_update').on('submit', function(e) {
    e.preventDefault();
    var frm_updated_data_vendor = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);

    Swal.fire({
        title: 'Do you want to Update this Vendor ?',
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
                url: "<?php echo base_url() ?>purchase/invoice/update_vendor",
                method: "POST",
                data: frm_updated_data_vendor,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Vendor updated successfully',
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