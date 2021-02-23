<div class="modal fade" id="modal_inventory_add_product">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 style="text-align:center">Add Inventory Products</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frm_inventory_product_add_new" role="form">
        <div class="modal-body" style="padding:10px 15px 10px 15px;">

          <div class="row">
              <div class="form-group col-lg-6 col-sm-6">
                <label for="type">Category Code<span style="color: red;">*</span>:</label>
                <select required class="form-control form-control-sm"
                  id="ddl_inventory_category_new" name="typecode">
                  <option value="">Please Select</option>
                  <?php foreach($catlist as $row){ ?>
                    <option value="<?php echo $row['catcode'];?>"><?php echo $row['catcode'];?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group col-lg-6 col-sm-6">
                <label for="inventoryitem">Item Name<span style="color: red;">*</span>:</label>
                <input type="text" class="form-control form-control-sm" id="txt_inventory_product_name" name="itemname" required="">
              </div>

              <div class="form-group col-lg-6 col-sm-6">
                <label for="item">Unit<span style="color: red;">*</span>:</label>
                <select  class="form-control form-control-sm"
                id="ddl_inventory_item_unit" name="unit">
                <option value="Ton">Ton</option>
                <option value="Piece">Piece</option>
                <option value="Cylinder">Cylinder</option>
                <option value="Coil">Coil</option>
                <option value="Feet">Feet</option>
                <option value="Metre">Metre</option>
                <option value="Yard">Yard</option>
                <option value="KG">KG</option>
                <option value="Litre">Litre</option>
              </select>
              </div>
              <div class="form-group col-lg-6 col-sm-6">
                <label for="inventoryitem">Default Price<span style="color: red;">*</span>:</label>
                <input type="text" class="form-control form-control-sm" id="txt_inventory_product_default_price" name="default_price" required="">
              </div>

              <div class="form-group col-lg-6 col-sm-6">
                <label for="inventoryitem">Item Code<span style="color: red;">*</span>:</label>
                <input type="text" class="form-control form-control-sm" id="txt_inventory_product_item_code" name="itemcode" required="">
              </div>

              <div class="form-group col-lg-6 col-sm-6">
                <label for="item">Trackable<span style="color: red;">*</span>:</label>
                <select  class="form-control form-control-sm"
                id="ddl_inventory_item_is_trackable" name="is_trackable">
                <option value="Ton">Yes</option>
                <option value="Piece">No</option>
              </select>
              </div>

          </div>

          </div>


          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" style="float:right" class="btn btn-primary button-sm">Add</button>
          </div>

        </form>
        </div>
    </div>
</div>
<script>

//Method for showing the modal view in the view_inventory_product
function view_add_new_inventory_product_modal(){
  
  $('#modal_inventory_add_product').modal('show');
}

$('#frm_inventory_product_add_new').on('submit', function(e) {
        e.preventDefault();
        var frm_inventory_product = new FormData($('#'+e.target.id)[0]);
        var values = $(this).serialize();
        console.log(values);
        //return;
       
        Swal.fire({
            title: 'Do you want to Add this new Product?',
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
                    url: "<?php echo base_url() ?>stock/inventory/add_new_inventory_product",
                    method: "POST",
                    data: frm_inventory_product,
                    contentType: false,
                    processData: false,
                    success:function(data) {
                        console.log(data);
                        //return;
                        if (data==1) {
                            Swal.fire({
                                title: 'Product added successfully',
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
