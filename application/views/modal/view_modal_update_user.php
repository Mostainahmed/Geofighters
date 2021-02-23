<div class="modal fade" id="modal_update_user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Edit Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_user_update" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">

                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="userdata">User Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_update_user_name"
                                name="username" required="">
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="userdata">Full Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_update_full_name"
                                name="fullname" required="">
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="userdata">Phone Number<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_update_phone_number"
                                name="phone_no" required="">
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="userdata">NID<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_update_nid" name="nid"
                                required="">
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="userdata">User ID<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_user_id_useless"
                                name="user_id_useless" disabled>
                        </div>

                        <div class="form-group col-lg-6 col-sm-6" style="display: none;">
                            <input type="text" class="form-control form-control-sm" id="txt_user_update_id"
                                name="user_id">
                        </div>
                    </div>
                </div>


                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" style="float:right" onClick="" class="btn btn-primary button-sm">Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function update_user(userid) {
    selected_user_dataset = current_user_dataset.find(function(user) {
        return user.user_id == userid;
    });
    console.log(selected_user_dataset);
    var user_name = selected_user_dataset['username'];
    console.log(user_name);

    //setting values from table to the form
    $('#txt_update_user_name').val(selected_user_dataset['username']);
    $('#txt_update_full_name').val(selected_user_dataset['fullname']);
    $('#txt_update_phone_number').val(selected_user_dataset['phone_no']);
    $('#txt_update_nid').val(selected_user_dataset['nid']);
    $('#txt_user_id_useless').val(selected_user_dataset['user_id']);
    $('#txt_user_update_id').val(selected_user_dataset['user_id']);

    $('#modal_update_user').modal('show');
}

$('#frm_user_update').on('submit', function(e) {
    e.preventDefault();
    var form_update_user = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);

    Swal.fire({
        title: 'Do you want to Update This User?',
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
                url: "<?php echo base_url() ?>user/update_user",
                method: "POST",
                data: form_update_user,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'User data updated successfully',
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