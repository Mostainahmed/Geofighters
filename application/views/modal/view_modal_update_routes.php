<div class="modal fade" id="modal_update_routes">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Edit Sub Region Name</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_routes_update" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">

                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="inventoryitem">Route Details<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="assigned_area_name_for_update" name="assigned_area_name"
                                required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6" style="display:none;">
                            <label for="inventoryitem">Routes ID<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="assigned_area_id_for_update" name="assigned_area_id"
                                required="">
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
function update_routes(assignedAreaID) {
    selected_routes_dataset = current_routes_dataset.find(function(routesList) {
        return routesList.assigned_area_id == assignedAreaID;
    });

    //setting values from table to the form
    $('#assigned_area_name_for_update').val(selected_routes_dataset['assigned_area_name']);
    $('#assigned_area_id_for_update').val(selected_routes_dataset['assigned_area_id']);

    $('#modal_update_routes').modal('show');
}
$('#frm_routes_update').on('submit', function(e) {
    e.preventDefault();
    var form_routes_update = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    //console.log(form_sub_region_update);
    //return;

    Swal.fire({
        title: 'Do you want to Update This Route?',
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
                url: "<?php echo base_url() ?>area/update_routes",
                method: "POST",
                data: form_routes_update,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Routes updated successfully',
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