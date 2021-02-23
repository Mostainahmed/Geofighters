<div class="modal fade" id="modal_distributor_stock_add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Add Stock to Distributor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_distributor_stock_add" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="region_id">Region name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm"
                                id="ddl_region_id_for_distributor_stock" name="region_id" required="">
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
                            <select required="" class="form-control form-control-sm"
                                id="ddl_sub_region_id_for_distributor_stock" name="sub_region_id">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="inventoryitem">Choose Routes<span style="color: red;">*</span>:</label>
                            <select required="" class="form-control form-control-sm"
                                id="ddl_routes_for_distributor_stock" name="assigned_area_id">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="inventoryitem">Choose Distributor<span style="color: red;">*</span>:</label>
                            <select required="" class="form-control form-control-sm" id="ddl_distributor_for_stock"
                                name="distributor_id">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="rsm">Phone Model<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_id_phone_model_for_stock_distributor"
                                name="phone_id" required="">
                                <option value="">Please Select</option>
                                <?php foreach ($phone_list as $row) { ?>
                                <option id="phone_id" value="<?php echo $row['phone_id']; ?>">
                                    <?php echo $row['phone_model']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="mobiledata">Stock<span style="color: red;">*</span>:</label>
                            <input type="number" class="form-control form-control-sm" id="txt_phone_model_stock"
                                name="stock" required="">
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                        <label for="mobiledata">Date<span style="color: red;">*</span>:</label>
                            <input type="date" class="form-control form-control-sm" id="date_of_stock" name="stock_date"
                                required="">
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
var chooseDistributorList = [];
//Method for showing the modal view in the view_inventory_product
function view_distributor_stock_add() {
    $('#modal_distributor_stock_add').modal('show');
}

$("#ddl_region_id_for_distributor_stock").change(function() {

    if (document.getElementById('ddl_region_id_for_distributor_stock').value == "") {

        var selectitem = document.getElementById("ddl_region_id_for_distributor_stock");
        selectitem.innerHTML = "";

    } else {
        var region_id = document.getElementById('ddl_region_id_for_distributor_stock').value;
        var selectitem = document.getElementById("ddl_sub_region_id_for_distributor_stock");
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
                var select = document.getElementById("ddl_sub_region_id_for_distributor_stock");
                $('#ddl_sub_region_id_for_distributor_stock').attr('required', true);
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

                    document.getElementById('ddl_sub_region_id_for_distributor_stock').appendChild(
                        option);
                }
            },
            error: function() {

            }
        });
    }
});

$("#ddl_sub_region_id_for_distributor_stock").change(function() {

    if (document.getElementById('ddl_sub_region_id_for_distributor_stock').value == "") {

        var selectitem = document.getElementById("ddl_sub_region_id_for_distributor_stock");
        selectitem.innerHTML = "";

    } else {
        var sub_region_id = document.getElementById('ddl_sub_region_id_for_distributor_stock').value;
        var selectitem = document.getElementById("ddl_routes_for_distributor_stock");
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
                var select = document.getElementById("ddl_routes_for_distributor_stock");
                $('#ddl_routes_for_distributor_stock').attr('required', true);
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

                    document.getElementById('ddl_routes_for_distributor_stock').appendChild(option);
                }
            },
            error: function() {

            }
        });
    }
});

$("#ddl_routes_for_distributor_stock").change(function() {

    if (document.getElementById('ddl_routes_for_distributor_stock').value == "") {

        var selectitem = document.getElementById("ddl_routes_for_distributor_stock");
        selectitem.innerHTML = "";

    } else {
        var assigned_area_id = document.getElementById('ddl_routes_for_distributor_stock').value;
        var selectitem = document.getElementById("ddl_distributor_for_stock");
        selectitem.innerHTML = "";
        chooseDistributorIdList = [];
        chooseDistributorNameList = [];
        console.log(assigned_area_id);
        //return;
        $.ajax({
            url: "<?php echo base_url(); ?>distributor/get_distributor_list_by_assigned_area_id",
            type: "POST",
            data: {
                'assigned_area_id': assigned_area_id
            },
            beforeSend: function() {
                pleaseWait();
            },
            complete: function() {
                Swal.close();
            },
            success: function(data) {
                var distributor_list = JSON.parse(data);
                console.log(distributor_list);
                var select = document.getElementById("ddl_distributor_for_stock");
                $('#ddl_distributor_for_stock').attr('required', true);
                select.innerHTML = "";
                select.innerHTML += "<option value=''>Please Select</option>";
                // Populate list with options:
                for (var i in distributor_list) {
                    var option = document.createElement("option");
                    chooseDistributorIdList.push(distributor_list[i]['distributor_id']);
                    chooseDistributorNameList.push(distributor_list[i]['distributor_name']);

                    var assignedAreaId = distributor_list[i]['distributor_id'];
                    var assignedAreaName = distributor_list[i]['distributor_name'];
                    option.value = assignedAreaId;
                    option.innerHTML = assignedAreaName;

                    document.getElementById('ddl_distributor_for_stock').appendChild(option);
                }
            },
            error: function() {

            }
        });
    }
});

$('#frm_distributor_stock_add').on('submit', function(e) {
    e.preventDefault();
    var form_distributor_stock_add = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    //return;

    Swal.fire({
        title: 'Do you want to Add these Stock to this distributor?',
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
                url: "<?php echo base_url() ?>distributor/add_stock_to_distributor",
                method: "POST",
                data: form_distributor_stock_add,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Stock added to distributor successfully',
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