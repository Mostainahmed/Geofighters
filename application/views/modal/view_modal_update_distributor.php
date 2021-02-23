<div class="modal fade" id="modal_update_distributor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Edit Distributor Name</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_distributor_update" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">

                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="inventoryitem">Distributor Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="distributor_name_for_update" name="distributor_name"
                                required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6" style="display:none;">
                            <label for="inventoryitem">Distributor ID<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="distributor_id_for_update" name="distributor_id"
                                required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="inventoryitem">Contact No<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="distributor_phone_no_for_update" name="distributor_phone_no"
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
function update_distributor(distributorID) {
    selected_distributor_dataset = current_distributor_dataset.find(function(distributorList) {
        return distributorList.distributor_id == distributorID;
    });

    //setting values from table to the form
    $('#distributor_name_for_update').val(selected_distributor_dataset['distributor_name']);
    $('#distributor_id_for_update').val(selected_distributor_dataset['distributor_id']);
    $('#distributor_phone_no_for_update').val(selected_distributor_dataset['distributor_phone_no']);

    $('#modal_update_distributor').modal('show');
}
$('#frm_distributor_update').on('submit', function(e) {
    e.preventDefault();
    var form_distributor_update = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    //console.log(form_sub_region_update);
    //return;

    Swal.fire({
        title: 'Do you want to Update This Distributor?',
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
                url: "<?php echo base_url() ?>distributor/update_distributor",
                method: "POST",
                data: form_distributor_update,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Distributor updated successfully',
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