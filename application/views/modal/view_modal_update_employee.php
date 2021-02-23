<div class="modal fade" id="modal_employee_update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_employee_update" role="form">
            	<div class="modal-body">
                    <div class="row">
                       
                        <div class="" style="display: none;">
                            <label for="type">Code<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" 
                             id="txt_staffcode_edit" name="staffcode"  required>
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="type">Type<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" 
                            onchange="typechange_edit();" id="ddl_type_edit" name="staffgroup" >
                                <option value="">Please Select</option>
                                <option value="officer">Officer</option>
                                <option value="technical">Staff</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="designation">Designation<span style="color: red;">*</span>:</label>
                            <select required class="form-control disabled form-control-sm" onchange="designationchange_edit();"   id="ddl_desgination_edit" name="designation" >
                            </select>
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="dob">Date of Birth<span style="color: red;">*</span>:</label>
                             <input type="text" class="form-control form-control-sm" 
                             id="txt_dob_edit" name="dob"  required>
                        </div>  
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="age">Age:</label>
                            <input type="text" class="form-control disabled form-control-sm" 
                            id="txt_age_edit" name="staff_age" disabled >
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="name">Name<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_name_edit" name="staffname"  required>
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="namebn">Name(Bn):</label>
                            <input type="text" class="form-control form-control-sm" id="txt_namebn_edit" name="staffname_bn">
                        </div>

                        <div class="form-group col-lg-9 col-sm-6">
                            <label for="address">Address<span style="color: red;">*</span>:</label>
                             <input type="text" class="form-control form-control-sm" id="txt_address_edit" name="address"  required>
                        </div>  
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="join">Joining Date<span style="color: red;">*</span>:</label>
                             <input type="text" class="form-control form-control-sm" id="txt_joined_edit" name="joinedon"  required>
                        </div>

                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="phone">Phone<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_phone_edit" name="phone1"  required>
                        </div>
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="emergencycontact">Emergency Phone<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_emergencyphn_edit" name="emergencycontact"  required>
                        </div> 
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="nid">NID/Birth Certificate<span style="color: red;">*</span>:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_nid_edit" name="nid"  required>
                        </div> 

                        <div class="form-group col-lg-4 col-sm-6">
                           <label for="blood">Blood Group<span style="color: red;">*</span>:</label>
                            <select  required class="form-control form-control-sm" id="ddl_blood_edit" name="bloodgroup">
                                <option value="">Please Select</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="Unkonwn">Unkonwn</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="status">Marital Status<span style="color: red;">*</span>:</label>
                            <select class="form-control form-control-sm" id="ddl_status_edit" name="maritalstatus" required>
                                <option value="">Please Select</option>
                                <option value="UnMarried">UnMarried</option>
                                <option value="Married">Married</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="salary">Salary:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_salary_edit" name="salary" value="0" >
                        </div>

                        <div class="form-group col-lg-6 col-sm-6" id="license_edit" style="display: none">
                            <label for="license">Driving License No.<span style="color: red;">**</span>:</label>
                             <input type="text" required class="form-control  form-control-sm" id="txt_license_edit" name="drivinglicense" >
                        </div>
                        <div class="form-group col-lg-6 col-sm-6" id="expires_edit" style="display: none">
                            <label for="licenseexpiry">Driving License Expires<span style="color: red;">**:</label>
                            <input type="text" required class="form-control  form-control-sm"  id="txt_expires_edit" name="licenseexpiry"  >
                        </div>
                    </div> 
        	   </div>  
            	
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>    
<script>
    var officer = ["Please Select", "Executive", "Senior Executive","Account Executive","Sales Executive","Sales Manager"];
    var technical = ["Please Select","Sr. Technician","Technician","Jr. Technician","Asst. Technician","Technician","Asst. Technician","Driver","Supervisor"];

    $( function() {
    
      $( "#txt_joined_edit" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange:  '2004:+nn',
        onSelect: function() {
          selected = $(this).val();
        }
      });

    });

    $(function() {
     
      $( "#txt_expires_edit" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        onSelect: function() {
          selected = $(this).val();
        }
      });

    });

    $(function() {

      $( "#txt_dob_edit" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange:  '1950:+nn',
        maxDate: new Date(),
        onSelect: function(dateText) {
          var d = $(this).datepicker("getDate");
          var age = getAge(d);
          document.getElementById("txt_age_edit").value = age;
        }
      });

    });

    function getAge(dateString) {
      var today = new Date();
      var birthDate = new Date(dateString);
      var age = today.getFullYear() - birthDate.getFullYear();
      var m = today.getMonth() - birthDate.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
          age--;
      }
      return age;
    }

    function updatestaff(staffcode){
        
        selected_employee_dataset = current_employee_dataset.find(function(employee) {
             return employee.staffcode == staffcode;
        }); 
        console.log(selected_employee_dataset);
        $('#txt_staffcode_edit').val(staffcode);
        if(selected_employee_dataset['staffgroup']=="driver"){
            $('#ddl_type_edit').val("technical");
            document.getElementById("ddl_desgination_edit").disabled = true;
            document.getElementById("license_edit").style.display = "block";
            document.getElementById("expires_edit").style.display = "block";
            $('#txt_license_edit').val(selected_employee_dataset['drivinglicense']);
            $('#txt_expires_edit').val(selected_employee_dataset['licenseexpiry']);
        }else{
            $('#ddl_type_edit').val(selected_employee_dataset['staffgroup']);
            document.getElementById("ddl_desgination_edit").disabled = false;
            document.getElementById("license_edit").style.display = "none";
            document.getElementById("expires_edit").style.display = "none";
            $('#txt_license_edit').val("");
            $('#txt_expires_edit').val("");
        }

        $('#ddl_blood_edit').val(selected_employee_dataset['bloodgroup']);
        $('#ddl_status_edit').val(selected_employee_dataset['maritalstatus']);

        console.log(selected_employee_dataset['staffgroup']);
        if(selected_employee_dataset['staffgroup']=="technical"){
            //console.log(selected_employee_dataset['designation']);
            $('#ddl_desgination_edit').empty();
            for (var i in technical) {
                    var option = document.createElement("option");
                    if(technical[i]=="Please Select"){
                        option.value = "";
                    }else{
                        option.value = technical[i];
                    }
                    option.innerHTML = technical[i];
                    document.getElementById('ddl_desgination_edit').appendChild(option);
            }
            if(selected_employee_dataset['designation']=="Driver"){
                document.getElementById("ddl_desgination_edit").disabled = true;
                document.getElementById("license_edit").required = true;
                document.getElementById("expires_edit").required = true;
            }else{
                document.getElementById("license_edit").required = false;
                document.getElementById("expires_edit").required = false;
            }
        }else if(selected_employee_dataset['staffgroup']=="officer"){
            
            $('#ddl_desgination_edit').empty();
            for (var i in officer) {
                var option = document.createElement("option");
                
                if(officer[i]=="Please Select"){
                    option.value = "";
                }else{
                    option.value = officer[i];
                }
                option.innerHTML = officer[i];
                document.getElementById('ddl_desgination_edit').appendChild(option);
            }
        }
        var designation = selected_employee_dataset['designation'];
      
        var ddldesignation = document.getElementById("ddl_desgination_edit");

        for (var i = 0; i < ddldesignation.options.length; i++) {
          if (ddldesignation.options[i].text == designation) {
            ddldesignation.options[i].selected = true;
          }
        }

        // if(selected_employee_dataset['designation']=="Driver"){
           
        // }else{
        //     document.getElementById("ddl_desgination_edit").disabled = false;
        //     document.getElementById("license_edit").style.display = "none";
        //     document.getElementById("expires_edit").style.display = "none";
        //     $('#txt_license_edit').val("");
        //     $('#txt_expires_edit').val("");
        // }

        $('#txt_name_edit').val(selected_employee_dataset['staffname']);
        $('#txt_namebn_edit').val(selected_employee_dataset['staffname_bn']);
        $('#txt_address_edit').val(selected_employee_dataset['address']);
        $('#txt_phone_edit').val(selected_employee_dataset['phone1']);
        $('#txt_emergencyphn_edit').val(selected_employee_dataset['emergencycontact']);
        $('#txt_joined_edit').val(selected_employee_dataset['joinedon']);
        $('#txt_dob_edit').val(selected_employee_dataset['dob']);
        var dob = selected_employee_dataset['dob'];
        var age = getAge(dob);
      
        $('#txt_age_edit').val(age);
        $('#txt_nid_edit').val(selected_employee_dataset['nid']);
        $('#txt_salary_edit').val(selected_employee_dataset['salary']);
     
       // console.log(selected_employee_dataset['staffname']);
        $('#modal_employee_update').modal('show');
    }
    
    function typechange_edit(){

        var type = document.getElementById('ddl_type_edit').value;
        
        if(type=="officer"){

            $('#ddl_desgination_edit').attr('disabled', false);
            $('#ddl_desgination_edit').empty();

            for (var i in officer) {
                var option = document.createElement("option");
                
                if(officer[i]=="Please Select"){
                    option.value = "";
                }else{
                    option.value = officer[i];
                }
                option.innerHTML = officer[i];
                document.getElementById('ddl_desgination_edit').appendChild(option);
            }

            document.getElementById("txt_license_edit").disabled = true;
            document.getElementById("txt_expires_edit").disabled = true;

        }else if(type=="technical"){

            $('#ddl_desgination_edit').attr('disabled', false);
            $('#ddl_desgination_edit').empty();

            for (var i in technical) {
                var option = document.createElement("option");
                if(technical[i]=="Please Select"){
                    option.value = "";
                }else{
                    option.value = technical[i];
                }
                option.innerHTML = technical[i];
                document.getElementById('ddl_desgination_edit').appendChild(option);
            }
        }
    }

    function designationchange_edit(){
        var designation = document.getElementById('ddl_desgination_edit').value;
        if(designation=="Driver"){
            document.getElementById("txt_license_edit").disabled = false;
            document.getElementById("txt_expires_edit").disabled = false;
            document.getElementById("ddl_desgination_edit").disabled = false;
            document.getElementById("license_edit").style.display = "block";
            document.getElementById("expires_edit").style.display = "block";
        }else{
            document.getElementById("txt_license_edit").disabled = true;
            document.getElementById("txt_expires_edit").disabled = true;
            document.getElementById("license_edit").style.display = "none";
            document.getElementById("expires_edit").style.display = "none";
        }
    }
    //  AJAX CALL OFF  UPDATE EMPLOYEE
    $('#frm_employee_update').on('submit', function(e) {
        e.preventDefault();
        var form_data = new FormData($('#'+e.target.id)[0]);
        //var values = $(this).serialize();

        Swal.fire({
            title: 'Do you want to Update Information?',
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
                    url: "<?php echo base_url() ?>hradmin/hr/edit_employee",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success:function(data) {
                        //console.log(data);

                        if (data==1) {
                            Swal.fire({
                                title: 'Information Updated successfully',
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
                        console.log(data);
                        somethingWentWrong();
                    }
                });
            }
        });
    });
</script>