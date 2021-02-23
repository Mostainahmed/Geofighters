<div class="modal fade" id="modal_travel_cost_detail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Budget Claim Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_budget_claim_details" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Travel Plan ID<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_travel_plan_id"
                                name="travel_plan_id" required readonly>
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">User Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_user_name_for_budget_claim"
                                name="username" required disabled>
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Base Station<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_base_station_for_budget_claim"
                                name="base_station" required disabled>
                        </div>
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Designation<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_designation_for_budget_claim"
                                name="designation" required disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Planned date<span style="color: red;">*</span>:</label>
                            <input type="date" class="form-control form-control-sm" id="ddl_planned_date_for_budget_claim"
                                name="planned_date" required disabled>
                        </div>
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Travelled To<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_travelled_location_for_budget_claim"
                                name="travelled_to" required disabled>
                        </div>
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Distance Type<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_distance_type_for_budget_claim"
                                name="distance_type" required disabled>
                        </div>
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Route Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_route_name_for_budget_claim"
                                name="route_name" required disabled>
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Route Details<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_route_details_for_budget_claim"
                                name="route_details" required disabled>
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Voucher Status<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_voucher_status_for_budget_claim"
                                name="voucher_status" required disabled>
                        </div>
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Bus Fare<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_bus_fare_for_budget_claim"
                                name="bus_fare" required readonly>
                        </div>
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Bus Location<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_bus_location_for_budget_claim"
                                name="bus_location" required disabled>
                        </div>
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Rikshaw Fare<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_rikshaw_fare_for_budget_claim"
                                name="rikshaw_fare" required readonly>
                        </div>
                        <div class="form-group col-lg-2 col-sm-2">
                            <label for="budget_claim">Rikshaw Location<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_rikshaw_location_for_budget_claim"
                                name="rikshaw_location" required disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3 col-sm-3">
                            <label for="budget_claim">CNG Fare<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_cng_fare_for_budget_claim"
                                name="cng_fare" required readonly>
                        </div>
                        <div class="form-group col-lg-3 col-sm-3">
                            <label for="budget_claim">CNG Location<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_cng_location_for_budget_claim"
                                name="cng_location" required disabled>
                        </div>
                        <div class="form-group col-lg-3 col-sm-3">
                            <label for="budget_claim">Bike Fare<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_bike_fare_for_budget_claim"
                                name="bike_fare" required readonly>
                        </div>
                        <div class="form-group col-lg-3 col-sm-3">
                            <label for="budget_claim">Bike Location<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_bike_location_for_budget_claim"
                                name="bike_location" required disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Food Cost<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_food_cost_for_budget_claim"
                                name="food_allowance" required readonly>
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Food Location<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_food_location_for_budget_claim"
                                name="food_location" required disabled>
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Hotel Rent Allowance<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_hotel_rent_for_budget_claim"
                                name="hotel_rent_allowance" required readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="budget_claim">User Remarks<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_user_remarks_for_budget_claim"
                                name="planned_date" required disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Admin Remarks<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_admin_remarks_for_budget_claim"
                                name="admin_remarks" required>
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Travel Bill<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_travel_bill_for_budget_claim"
                                name="bill_image" required>
                        </div>
                        <div class="form-group col-lg-4 col-sm-4">
                            <label for="budget_claim">Total Cost To Claim<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="ddl_total_cost_for_budget_claim"
                                name="total_budget_claim" required readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="reset" style="float:right;" class="btn btn-danger button-sm">Decline</button>
                    <button type="submit" style="float:right;" class="btn btn-success button-sm">Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

function view_travel_cost_detail_modal(travelPlanID){
    selected_budget_claim_dataset = current_budget_claim_dataset.find(function(budget_claim_list) {
        return budget_claim_list.travel_plan_id == travelPlanID;
    });
    console.log(selected_budget_claim_dataset);
    var user_name = selected_budget_claim_dataset['rikshaw_fare'];
    console.log(user_name);

    let bus_fare = Number(selected_budget_claim_dataset['bus_fare']);
    let rikshaw_fare = Number(selected_budget_claim_dataset['rikshaw_fare']);
    let cng_fare = Number(selected_budget_claim_dataset['cng_fare']);
    let bike_fare = Number(selected_budget_claim_dataset['bike_fare']);
    let food_allowance = Number(selected_budget_claim_dataset['food_allowance']);
    let hotel_rent = Number(selected_budget_claim_dataset['hotel_rent_allowance']);

    //setting values from table to the form
    $('#ddl_travel_plan_id').val(selected_budget_claim_dataset['travel_plan_id']);
    $('#ddl_user_name_for_budget_claim').val(selected_budget_claim_dataset['username']);
    $('#ddl_base_station_for_budget_claim').val(selected_budget_claim_dataset['base_station']);
    $('#ddl_designation_for_budget_claim').val(selected_budget_claim_dataset['designation']);
    $('#ddl_planned_date_for_budget_claim').val(selected_budget_claim_dataset['planned_date']);
    $('#ddl_travelled_location_for_budget_claim').val(selected_budget_claim_dataset['travelled_to']);
    $('#ddl_route_name_for_budget_claim').val(selected_budget_claim_dataset['route_name']);
    $('#ddl_route_details_for_budget_claim').val(selected_budget_claim_dataset['route_details']);
    $('#ddl_distance_type_for_budget_claim').val(selected_budget_claim_dataset['distance_type']);
    $('#ddl_voucher_status_for_budget_claim').val(selected_budget_claim_dataset['voucher_status']);
    $('#ddl_travel_bill_for_budget_claim').val(selected_budget_claim_dataset['bill_image'])

    $('#ddl_bus_fare_for_budget_claim').val(selected_budget_claim_dataset['bus_fare']);
    
    $('#ddl_bus_location_for_budget_claim').val(selected_budget_claim_dataset['bus_location']);
    $('#ddl_rikshaw_fare_for_budget_claim').val(selected_budget_claim_dataset['rikshaw_fare']);
    
    $('#ddl_rikshaw_location_for_budget_claim').val(selected_budget_claim_dataset['rikshaw_location']);
    $('#ddl_cng_fare_for_budget_claim').val(selected_budget_claim_dataset['cng_fare']);
    $('#ddl_cng_location_for_budget_claim').val(selected_budget_claim_dataset['cng_location']);
    $('#ddl_bike_fare_for_budget_claim').val(selected_budget_claim_dataset['bike_fare']);
    $('#ddl_bike_location_for_budget_claim').val(selected_budget_claim_dataset['bike_location']);
    $('#ddl_food_cost_for_budget_claim').val(selected_budget_claim_dataset['food_allowance']);
    $('#ddl_food_location_for_budget_claim').val(selected_budget_claim_dataset['food_location']);
    $('#ddl_hotel_rent_for_budget_claim').val(selected_budget_claim_dataset['hotel_rent_allowance']);

    let total_cost_to_claim = bus_fare + rikshaw_fare + cng_fare + bike_fare + food_allowance + hotel_rent;
    $('#ddl_total_cost_for_budget_claim').val(total_cost_to_claim + " BDT");

    $('#modal_travel_cost_detail').modal('show');
}

$('#frm_budget_claim_details').on('submit', function(e) {
    e.preventDefault();
    var form_budget_claim_details = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    Swal.fire({
        title: 'Do you want to approve this budget claim?',
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
                url: "<?php echo base_url() ?>travel/approve_budget_claim",
                method: "POST",
                data: form_budget_claim_details,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Budget Claim Approved',
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
                    somethingWentWrong();
                }
            });
        }
    });
});

$('#frm_budget_claim_details').on('reset', function(e) {
    e.preventDefault();
    var form_budget_claim_details = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    Swal.fire({
        title: 'Do you want to decline this budget claim?',
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
                url: "<?php echo base_url() ?>travel/decline_budget_claim",
                method: "POST",
                data: form_budget_claim_details,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data == 1) {
                        Swal.fire({
                            title: 'Budget Claim Declined',
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
                    somethingWentWrong();
                }
            });
        }
    });
});
</script>