<div class="modal fade" id="modal_update_inventory_category">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;">Update Inventory Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        	<div class="modal-body">
                <div class="" id="categoryinfo">
                    <div class="row">
                        <div class="form-group  col-lg-6 col-sm-6 ">
                            <label for="inventory_category">Category Name:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_category_name_update_new" name="catname" required="" >
                        </div>
                        <div class="form-group col-lg-6 col-sm-6 ">
                            <label for="inventory_category">Category Code:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_category_code_update_new" name="catcode"  required="" disabled>
                        </div>
                        <div class="form-group col-lg-6 col-sm-6" style="display: none;">
                            <input type="text" class="form-control form-control-sm"
                             id="txt_category_id_update" name="categoryid">
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="updatecategoryitems();">Update</button>
            </div>
        </div>
   </div>
</div>  
<script>
   
    function update_inventory_category(catcode){

        selected_category_dataset = current_category_dataset.find(function(category) {
             return category.catcode == catcode;
        });
        console.log(selected_category_dataset);
        $('#txt_category_name_update_new').val(selected_category_dataset['catname']);
        $('#txt_category_code_update_new').val(selected_category_dataset['catcode']);
        $('#txt_category_id_update').val(selected_category_dataset['id']);

        $('#modal_update_inventory_category').modal('show');
    }

    function updatecategoryitems(){
        if(document.getElementById('txt_category_name_update_new').value == ""){
            toastr.error('Please select category name');
        }else if(document.getElementById('txt_category_code_update_new').value == ""){
            toastr.error('Please select category code');
        }else{
            var catname = document.getElementById('txt_category_name_update_new').value;
            var catcode = document.getElementById('txt_category_code_update_new').value;
            var id  = document.getElementById('txt_category_id_update').value; 
            submitcategoryItem(catname,catcode,id);
            
        }
    }

    function submitcategoryItem(catname,catcode,id){

        Swal.fire({
            title: 'Do you want to Update this Category?',
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
            url: "<?php echo base_url(); ?>stock/inventory/update_inventory_category",
            type: "POST",
            data: {
            'catname': catname,
            'catcode':catcode,
            'id':id
            },
            beforeSend: function(){
                //pleaseWait();
            },
            complete: function(){
                // Swal.close();
            },
            success: function(data){
                console.log(data);
                if (data=="1") {
                   Swal.fire({
                    title: 'Category Updated successfully',
                      type: 'success',
                    }).then((data) => {
                        location.reload();
                    });
                }else if(data==403) {
                        accessDenied();
                } else if(data==440) {
                    sessionExpired();
                } else {
                    somethingWentWrong();
                }  
            },
            error: function() {

            }
        });
            }
        });
    }
  
</script>         