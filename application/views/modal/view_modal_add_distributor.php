<div class="modal fade" id="modal_distributor_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Add Distributor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_distributor_add" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="region_id">Region name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_region_id_for_distributor"
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
                            <select required="" class="form-control form-control-sm" id="ddl_sub_region_for_distributor"
                                name="sub_region_id">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="inventoryitem">Choose Routes<span style="color: red;">*</span>:</label>
                            <select required="" class="form-control form-control-sm" id="ddl_routes_for_distributor"
                                name="assigned_area_id">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="distributor_name">Distributor Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_distributor_name"
                                name="distributor_name" required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="distributor_phone">Distributor Phone Number<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_distributor_phone"
                                name="distributor_phone_no" required="">
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
var chooseRoutesIdList = [];
var chooseRoutesNameList = [];
//Method for showing the modal view in the view_inventory_product
function view_distributor_add() {
    $('#modal_distributor_add').modal('show');
}

$("#ddl_region_id_for_distributor").change(function() {

    if (document.getElementById('ddl_region_id_for_distributor').value == "") {

        var selectitem = document.getElementById("ddl_region_id_for_distributor");
        selectitem.innerHTML = "";

    } else {
        var region_id = document.getElementById('ddl_region_id_for_distributor').value;
        var selectitem = document.getElementById("ddl_sub_region_for_distributor");
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
                var select = document.getElementById("ddl_sub_region_for_distributor");
                $('#ddl_sub_region_for_distributor').attr('required', true);
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

                    document.getElementById('ddl_sub_region_for_distributor').appendChild(option);
                }
            },
            error: function() {

            }
        });
    }
});

$("#ddl_sub_region_for_distributor").change(function() {

    if (document.getElementById('ddl_sub_region_for_distributor').value == "") {

        var selectitem = document.getElementById("ddl_sub_region_for_distributor");
        selectitem.innerHTML = "";

    } else {
        var sub_region_id = document.getElementById('ddl_sub_region_for_distributor').value;
        var selectitem = document.getElementById("ddl_routes_for_distributor");
        selectitem.innerHTML = "";
        chooseSubRegionNameList = [];
        chooseItemUnitList = [];
        console.log(region_id);
        //return;
        $.ajax({
            url: "<?php echo base_url(); ?>distributor/get_routes_list_by_sub_region_id",
            type: "POST",
            data: {
                'sub_region_id': sub_region_id
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
                var select = document.getElementById("ddl_routes_for_distributor");
                $('#ddl_routes_for_distributor').attr('required', true);
                select.innerHTML = "";
                select.innerHTML += "<option value=''>Please Select</option>";
                // Populate list with options:
                for (var i in sub_region_list) {
                    var option = document.createElement("option");
                    chooseRoutesIdList.push(sub_region_list[i]['assigned_area_id']);
                    chooseRoutesNameList.push(sub_region_list[i]['assigned_area_name']);

                    var assignedAreaId = sub_region_list[i]['assigned_area_id'];
                    var assignedAreaName = sub_region_list[i]['assigned_area_name'];
                    option.value = assignedAreaId;
                    option.innerHTML = assignedAreaName;

                    document.getElementById('ddl_routes_for_distributor').appendChild(option);
                }
            },
            error: function() {

            }
        });
    }
});

$('#frm_distributor_add').on('submit', function(e) {
    e.preventDefault();
    var form_distributor_add = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    //return;

    Swal.fire({
        title: 'Do you want to Add This new distributor?',
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
                url: "<?php echo base_url() ?>distributor/add_distributor",
                method: "POST",
                data: form_distributor_add,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // return;
                    if (data) {
                        Swal.fire({
                            title: 'distributor added successfully',
                            type: 'success',
                        }).then((data) => {
                            location.reload();
                        });
                    } else if (data == 403) {
                        accessDenied();
                    } else if (data == 440) {
                        sessionExpired();
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