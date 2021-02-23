<div class="modal fade" id="modal_assign_base_station">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Assign Base Station</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_assign_users_base_station" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="region_id">Region name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_region_id_for_assigning_user"
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
                            <label for="inventoryitem">Choose Base Station<span style="color: red;">*</span>:</label>
                            <select required="" class="form-control form-control-sm" id="ddl_sub_region_for_assigning_user"
                                name="base_station">
                                <option value="">Please Select</option>

                            </select>
                            <!-- <input id="txt_invoiceitemcode_new" name="sub_region_id" type="hidden"
                                class="input-sm form-control-sm form-control" readonly> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="assign_user">User name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_user_for_assigning_base_station"
                                name="user_id" required="">
                                <option value="">Please Select</option>
                                <?php foreach ($user_list as $row) { ?>
                                <option id="user_id" value="<?php echo $row['user_id']; ?>">
                                    <?php echo $row['fullname']; ?>
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
var chooseSubRegionNameList = [];
var chooseItemUnitList = [];
var chooseSubRegionIdList = [];
//Method for showing the modal view in the view_inventory_product
function view_assign_user_base_station() {
    $('#modal_assign_base_station').modal('show');
}

$("#ddl_region_id_for_assigning_user").change(function() {

    if (document.getElementById('ddl_region_id_for_assigning_user').value == "") {

        var selectitem = document.getElementById("ddl_region_id_for_assigning_user");
        selectitem.innerHTML = "";

    } else {
        var region_id = document.getElementById('ddl_region_id_for_assigning_user').value;
        var selectitem = document.getElementById("ddl_sub_region_for_assigning_user");
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
                var select = document.getElementById("ddl_sub_region_for_assigning_user");
                $('#ddl_sub_region_for_assigning_user').attr('required', true);
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

                    document.getElementById('ddl_sub_region_for_assigning_user').appendChild(option);
                }
            },
            error: function() {

            }
        });
    }
});
$('#frm_assign_users_base_station').on('submit', function(e) {
    e.preventDefault();
    var form_assign_users_base_station = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    //return;

    Swal.fire({
        title: 'Do you want to assign the user to this Zone?',
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
                url: "<?php echo base_url() ?>user/assign_base_station",
                method: "POST",
                data: form_assign_users_base_station,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == "1") {
                        Swal.fire({
                            title: 'Base Station Set successfully',
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
                    console.log(data);
                    somethingWentWrong();
                }
            });
        }
    });
});
</script>