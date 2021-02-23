<div class="modal fade" id="modal_update_region">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Edit Region</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_region_update" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">

                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="inventoryitem">Region<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="region_name_for_update" name="region_name"
                                required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6" style="display:none;">
                            <label for="inventoryitem">Region ID<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="region_id_for_update" name="region_id"
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
function update_region(regionID) {
    selected_region_dataset = current_region_dataset.find(function(regionList) {
        return regionList.region_id == regionID;
    });

    //setting values from table to the form
    $('#region_name_for_update').val(selected_region_dataset['region_name']);
    $('#region_id_for_update').val(selected_region_dataset['region_id']);

    $('#modal_update_region').modal('show');
}
$('#frm_region_update').on('submit', function(e) {
    e.preventDefault();
    var form_region_update = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    //console.log(form_sub_region_update);
    //return;

    Swal.fire({
        title: 'Do you want to Update This Region?',
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
                url: "<?php echo base_url() ?>area/update_region",
                method: "POST",
                data: form_region_update,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Region updated successfully',
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