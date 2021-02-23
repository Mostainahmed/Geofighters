<div class="modal fade" id="modal_assign_asm_to_rsm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Assign ASM to RSM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_assign_asm_to_rsm" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="rsm">RSM Name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_rsm_name_for_asm" name="rsm_id"
                                required="">
                                <option value="">Please Select</option>
                                <?php foreach ($rsm_list as $row) { ?>
                                <option id="rsm_id" value="<?php echo $row['user_id']; ?>">
                                    <?php echo $row['full_name']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="region_id">ASM Name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_asm_name_for_assign" name="asm_id"
                                required="">
                                <option value="">Please Select</option>
                                <?php foreach ($asm_list as $row) { ?>
                                <option id="asm_id" value="<?php echo $row['user_id']; ?>">
                                    <?php echo $row['full_name']; ?>
                                </option>
                                <?php } ?>
                            </select>
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
function view_assign_asm_to_rsm() {
    $('#modal_assign_asm_to_rsm').modal('show');
}

$('#frm_assign_asm_to_rsm').on('submit', function(e) {
    e.preventDefault();
    var form_assign_asm_to_rsm = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();                       
    console.log(values);
    //return;

    Swal.fire({
        title: 'Do you want to Assign this ASM to this RSM?',
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
                url: "<?php echo base_url() ?>user/assign_asm_to_rsm",
                method: "POST",
                data: form_assign_asm_to_rsm,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'ASM assigned to this RSM successfully',
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