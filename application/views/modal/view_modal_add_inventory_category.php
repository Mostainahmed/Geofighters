<div class="modal fade" id="modal_vendor_add">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;">Add New Inventory Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_inventory_category_add_new" role="form">
            	<div class="modal-body">
                    <div class="" id="categoryinfo">
                        <div class="row">
                            <div class="form-group  col-lg-6 col-sm-6 ">
                                <label for="salary">Category Name:</label>
                                <input type="text" class="form-control form-control-sm" id="txt_vendorname_new" name="catname" required="" >
                            </div>
                            <div class="form-group col-lg-6 col-sm-6 ">
                                <label for="salary">Category Code:</label>
                                <input type="text" class="form-control form-control-sm" id="txt_vendoraddress_new" name="catcode"  required="">
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

    function view_inventory_category_modal(){

        $('#modal_vendor_add').modal('show');
    }
    $('#frm_inventory_category_add_new').on('submit', function(e) {
        e.preventDefault();
        var frm_inventory_category = new FormData($('#'+e.target.id)[0]);
        var values = $(this).serialize();
        //console.log(values);
       
        Swal.fire({
            title: 'Do you want to Add new Category?',
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
                    url: "<?php echo base_url() ?>inv/inventory/add_inventory_category",
                    method: "POST",
                    data: frm_inventory_category,
                    contentType: false,
                    processData: false,
                    success:function(data) {
                        console.log(data);
                        if (data==1) {
                            Swal.fire({
                                title: 'Category added successfully',
                                type: 'success',
                            }).then((data) => {
                                location.reload();
                            });
                        } else if(data==403) {
                            accessDenied();
                        } else if(data==440) {
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