<div class="modal fade" id="modal_add_regions">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Regions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_regions_add_new" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group  col-lg-12 col-sm-12 ">
                                <label for="region">Regions Name:</label>
                                <input type="text" class="form-control form-control-sm" id="txt_regions_name_new"
                                    name="region_name" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function view_regions_modal() {
    var smquery = window.matchMedia("(max-width: 420px)");
    $('#modal_add_regions').modal('show');
}
$('#frm_regions_add_new').on('submit', function(e) {
    e.preventDefault();
    var form_regions = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);

    Swal.fire({
        title: 'Do you want to Add new Region ?',
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
                url: "<?php echo base_url() ?>area/add_regions",
                method: "POST",
                data: form_regions,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Region added successfully',
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
                            title: 'Region Exist',
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