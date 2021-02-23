<div class="modal fade" id="modal_request_inventory_product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Request Inventory Products</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_request_inventory_product" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="type">Item name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_inventory_request_item_name"
                                name="itemcode" >
                                <option value="">Please Select</option>
                                <?php foreach ($list_itemname as $row) { ?>
                                <option id="item_option" value="<?php echo $row['itemcode']; ?>" <?php echo ($row['request_status'] == 1) ? "disabled style='color:red;'": ""; ?> >
                                    <?php echo $row['itemname']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="inventoryitem">Required Date<span style="color: red;">*</span>:</label>
                            <input type="date" class="form-control form-control-sm" id="txt_product_required_date"
                                name="required_date" required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="inventoryitem">Unit Required<span style="color: red;">*</span>:</label>
                            <input type="number" class="form-control form-control-sm"
                                id="txt_inventory_product_unit_required" name="no_of_unit_required" required="">
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
//Method for showing the modal view in the view_inventory_product
function view_request_inventory_product() {

    $('#modal_request_inventory_product').modal('show');
}

$('#frm_request_inventory_product').on('submit', function(e) {
    e.preventDefault();
    var frm_inventory_product = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    // return;

    Swal.fire({
        title: 'Do you want to request this Product?',
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
                url: "<?php echo base_url() ?>stock/inventory/request_inventory_product",
                method: "POST",
                data: frm_inventory_product,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Request added successfully',
                            type: 'success',
                        }).then((data) => {
                            location.reload();
                        });
                    } else if (data == 403) {
                        accessDenied();
                    } else if (data == 440) {
                        sessionExpired();
                    } else if (data == 3) {
                        Swal.fire({
                            type: 'error',
                            title: 'Not allowed',
                            text: 'You cannot request for an item which is already requested once!',
                        }).then((data) => {
                            location.reload();
                        });
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