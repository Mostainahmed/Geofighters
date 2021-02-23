<div class="modal fade" id="modal_profile_distributor">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Save Distributor Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_profile_distributor" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">

                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="distributorprofile">Company Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="company_name_for_distributor_profile" name="company_name" required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="distributorprofile">Proprietor Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="proprietor_name_for_distributor_profile" name="proprietor_name" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="distributorprofile">Phone No<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="phone_no_for_distributor_profile" name="distributor_phone_no_for_profile"
                                required="">
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="distributorprofile">District<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="district_for_distributor_profile" name="distributor_district" required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="distributorprofile">Person Details<span style="color: red;">*</span>:</label>
                            <table class="table table-hover table-bordered text-center table-lg"
                                id="distributor_profile_table">
                                <thead>
                                    <tr>
                                        <th scope="col">Person Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col"><a href="javascript:void(0)" onclick="add_extra_row();"><i
                                                    class="fas fa-plus"></i> Add More</a></th>
                                    </tr>
                                    <tr>
                                        <td scope="col"><input type="text" id="personname"
                                                name="person_name_distributor"></td>
                                        <td scope="col"><input type="text" id="designation"
                                                name="person_designation_distributor"></td>
                                        <td scope="col"><input type="text" id="personname"
                                                name="person_phone_number_distributor"></td>
                                        <td scope="col"></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                            <div class="table_extra" id="distributor_profile_table_extra">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="distributorprofile">Account Details<span style="color: red;">*</span>:</label>
                            <table class="table table-hover table-bordered text-center table-lg"
                                id="distributor_account_table">
                                <thead>
                                    <tr>
                                        <th scope="col">Account Name</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">Bank Name</th>
                                        <th scope="col">Branch Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col"><a href="javascript:void(0)"
                                                onclick="add_extra_account_row();"><i class="fas fa-plus"></i> Add
                                                More</a></th>
                                    </tr>
                                    <tr>
                                        <td scope="col"><input type="text" id="account_name"
                                                name="account_name_distributor"></td>
                                        <td scope="col"><input type="text" id="account_number"
                                                name="account_number_distributor"></td>
                                        <td scope="col"><input type="text" id="bank_name" name="bank_name_distributor">
                                        </td>
                                        <td scope="col"><input type="text" id="branch_name"
                                                name="branch_name_distributor"></td>
                                        <td scope="col"><input type="text" id="branch_address"
                                                name="address_distributor"></td>
                                        <td scope="col"></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                            <div class="table_account_extra" id="distributor_account_table_extra">
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
var distributorProfileListHTML = '';
var distributorAccountListHTML = '';
function view_distributor_profile_modal() {
    $('#modal_profile_distributor').modal('show');
}

function add_extra_row() {
    var slcount = Math.floor(Math.random() * 10);
    distributorProfileListHTML +=
        '<table class="table table-hover table-bordered text-center table-lg" style="width:100%;text-align: center; ">';
    distributorProfileListHTML += '<tbody>';
    distributorProfileListHTML += '<tr id="' + slcount + '">';
    distributorProfileListHTML += '<td><input type="text" id="' + slcount +
        'account_name" name="person_name_distributor"></td>';
    distributorProfileListHTML += '<td><input type="text" id="' + slcount +
        'designation" name="person_designation_distributor"></td>';
    distributorProfileListHTML += '<td><input type="text" id="' + slcount +
        'phone_number" name="person_name_distributor"></td>';
    distributorProfileListHTML += '<td><a onClick="delete_row(' + slcount +
        ');" id="delete_button" class="btn btn-sm btn-danger"><i class="fas fa-trash fa-sm">Remove</i></a></td>';
    distributorProfileListHTML += '</tr>';
    distributorProfileListHTML += '</tbody>';
    distributorProfileListHTML += '</table>';
    document.getElementById('distributor_profile_table_extra').innerHTML = distributorProfileListHTML;
}

function add_extra_account_row() {
    var slcount = Math.floor(Math.random() * 100);
    distributorAccountListHTML +=
        '<table class="table table-hover table-bordered text-center table-lg" style="width:100%;text-align: center; ">';
    distributorAccountListHTML += '<tbody>';
    distributorAccountListHTML += '<tr id="' + slcount + '">';
    distributorAccountListHTML += '<td><input type="text" id="' + slcount +
        'personname" name="person_name_distributor"></td>';
    distributorAccountListHTML += '<td><input type="text" id="' + slcount +
        'account_number" name="person_designation_distributor"></td>';
    distributorAccountListHTML += '<td><input type="text" id="' + slcount +
        'bank_name" name="person_name_distributor"></td>';
    distributorAccountListHTML += '<td><input type="text" id="' + slcount +
        'branch_name" name="person_name_distributor"></td>';
    distributorAccountListHTML += '<td><input type="text" id="' + slcount +
        'branch_address" name="person_name_distributor"></td>';
    distributorAccountListHTML += '<td><a onClick="delete_row(' + slcount +
        ');" id="delete_button_account" class="btn btn-sm btn-danger"><i class="fas fa-trash fa-sm">Remove</i></a></td>';
    distributorAccountListHTML += '</tr>';
    distributorAccountListHTML += '</tbody>';
    distributorAccountListHTML += '</table>';
    document.getElementById('distributor_account_table_extra').innerHTML = distributorAccountListHTML;
}

function delete_row(id) {
    console.log(id);
    document.getElementById(id).remove();
}
</script>