<div class="modal fade" id="modal_routes_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Add Sub Region</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_routes_add" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="region_id">Region name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_region_id_for_routes"
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
                            <label for="inventoryitem">Choose Sub Region<span style="color: red;">*</span>:</label>
                            <select required="" class="form-control form-control-sm" id="ddl_sub_region_for_routes"
                                name="sub_region_id">
                                <option value="">Please Select</option>

                            </select>
                            <!-- <input id="txt_invoiceitemcode_new" name="sub_region_id" type="hidden"
                                class="input-sm form-control-sm form-control" readonly> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="sub_region_id">Area<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_routes_name"
                                name="assigned_area_name" required="">
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
var chooseSubRegionNameList = [];
var chooseItemUnitList = [];
var chooseSubRegionIdList = [];
//Method for showing the modal view in the view_inventory_product
function view_routes_modal() {
    $('#modal_routes_add').modal('show');
}

$("#ddl_region_id_for_routes").change(function() {

if (document.getElementById('ddl_region_id_for_routes').value == "") {

    var selectitem = document.getElementById("ddl_region_id_for_routes");
    selectitem.innerHTML = "";

} else {
    var region_id = document.getElementById('ddl_region_id_for_routes').value;
    var selectitem = document.getElementById("ddl_sub_region_for_routes");
    selectitem.innerHTML = "";
    chooseSubRegionNameList = [];
    chooseItemUnitList = [];
    console.log(region_id);
    //return;
    $.ajax({
        url: "<?php echo base_url(); ?>area/get_sub_region_list_by_region_id",
        type: "POST",
        data: {
            'region_id': region_id
        },
        beforeSend: function() {
            pleaseWait();
        },
        complete: function() {
            Swal.close();
        },
        success: function(data) {
            var sub_region_list = JSON.parse(data);
            console.log(sub_region_list);
            var select = document.getElementById("ddl_sub_region_for_routes");
            $('#ddl_sub_region_for_routes').attr('required', true);
            select.innerHTML = "";
            select.innerHTML += "<option value=''>Please Select</option>";
            // Populate list with options:
            for (var i in sub_region_list) {
                var option = document.createElement("option");
                chooseSubRegionIdList.push(sub_region_list[i]['sub_region_id']);
                chooseSubRegionNameList.push(sub_region_list[i]['sub_region_name']);

                var subRegionId = sub_region_list[i]['sub_region_id'];
                var subRegionName = sub_region_list[i]['sub_region_name'];
                option.value = subRegionId;
                option.innerHTML = subRegionName;

                document.getElementById('ddl_sub_region_for_routes').appendChild(option);
            }
        },
        error: function() {

        }
    });
}
});
$('#frm_routes_add').on('submit', function(e) {
    e.preventDefault();
    var form_routes_add = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    //return;

    Swal.fire({
        title: 'Do you want to Add This new Area?',
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
                url: "<?php echo base_url() ?>area/add_routes",
                method: "POST",
                data: form_routes_add,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // return;
                    if (data) {
                        Swal.fire({
                            title: 'Area added successfully',
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
                            title: 'Area Exist',
                            type: 'error',
                        }).then((data) => {
                            location.reload();
                        });
                    }else {
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