<div class="modal fade" id="modal_sub_region_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Add Sub Region</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_sub_region_add" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="region_id">Region name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_region_id"
                                name="region_id" required="">
                                <option value="">Please Select</option>
                                <?php foreach ($region_array as $row) { ?>
                                <option id="region_id" value="<?php echo $row['region_id']; ?>">
                                    <?php echo $row['region_name']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="sub_region_id">Sub Region Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_sub_region_name"
                                name="sub_region_name" required="">
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
function view_sub_regions_modal() {

    $('#modal_sub_region_add').modal('show');
}
$('#frm_sub_region_add').on('submit', function(e) {
    e.preventDefault();
    var form_sub_regions = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);

    Swal.fire({
        title: 'Do you want to Add new Sub Region ?',
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
                url: "<?php echo base_url() ?>area/add_sub_regions",
                method: "POST",
                data: form_sub_regions,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Sub Region added successfully',
                            type: 'success',
                        }).then((data) => {
                            location.reload();
                        });
                    } else if (data == 403) {
                        accessDenied();
                    } else if (data == 440) {
                        sessionExpired();
                    }else if (data == 3) {
                        Swal.fire({
                            title: 'Sub Region Exist',
                            type: 'error',
                        }).then((data) => {
                            location.reload();
                        });
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