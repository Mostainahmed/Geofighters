<div class="modal fade" id="modal_update_requested_inventory_product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Edit Requested Inventory Items</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_request_inventory_product_update" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">

                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="inventoryitem">Item Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="txt_inventory_requested_product_update_item_name_useless" name="itemname_useless"
                                required="" disabled>
                        </div>

                        <div class="form-group col-lg-6 col-sm-6" style="display: none;">
                            <label for="inventoryitem">Item Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="txt_inventory_requested_product_update_item_name" name="itemname">
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="inventoryitem">Required Date<span style="color: red;">*</span>:</label>
                            <input type="date" class="form-control form-control-sm"
                                id="txt_product_required_date_update" name="required_date" required="">
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="inventoryitem">Unit Required<span style="color: red;">*</span>:</label>
                            <input type="number" class="form-control form-control-sm"
                                id="txt_inventory_product_unit_required_update" name="no_of_unit_required" required="">
                        </div>

                    </div>

                </div>


                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" style="float:right" class="btn btn-primary button-sm">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
function update_requested_inventory_product(productitemname) {
    selected_requested_product_dataset = current_requested_product_dataset.find(function(product) {
        return product.itemname == productitemname;
    });

    //setting values from table to the form
    $('#txt_inventory_requested_product_update_item_name_useless').val(selected_requested_product_dataset['itemname']);
    $('#txt_inventory_requested_product_update_item_name').val(selected_requested_product_dataset['itemname']);
    $('#txt_product_required_date_update').val(selected_requested_product_dataset['required_date']);
    $('#txt_inventory_product_unit_required_update').val(selected_requested_product_dataset['no_of_unit_required']);

    $('#modal_update_requested_inventory_product').modal('show');
}

$('#frm_request_inventory_product_update').on('submit', function(e) {
    e.preventDefault();
    var frm_inventory_requested_product_update = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    console.log(frm_inventory_requested_product_update);
    //return;

    Swal.fire({
        title: 'Do you want to Update This Request?',
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
                url: "<?php echo base_url() ?>stock/inventory/update_requested_inventory_product",
                method: "POST",
                data: frm_inventory_requested_product_update,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Request updated successfully',
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