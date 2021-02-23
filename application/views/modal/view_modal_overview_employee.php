<div class="modal fade" id="modal_employee_overview">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header overview">
                <h4 class="modal-title">Overview</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          
            	<div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="type">Type:</label>
                            <input type="text" disabled class="form-control form-control-sm" 
                             id="txt_stafftype_overview" >
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="designation">Designation:</label>
                             <input type="text" disabled class="form-control form-control-sm" 
                             id="txt_staffdesgination_overview"  >
                        </div>
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="dob">Date of Birth:</label>
                             <input type="text" disabled class="form-control form-control-sm" 
                             id="txt_staffdob_overview" >
                        </div>  
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="age">Age:</label>
                            <input type="text" class="form-control disabled form-control-sm" 
                            id="txt_staffage_overview" name="staff_age" disabled >
                        </div>

                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_staffname_overview" name="staffname"  disabled>
                        </div>
                        <div class="form-group col-lg-6 col-sm-6">
                            <label for="namebn">Name(Bn):</label>
                            <input type="text" disabled class="form-control form-control-sm" id="txt_staffnamebn_overview" >
                        </div>

                        <div class="form-group col-lg-9 col-sm-6">
                            <label for="address">Address:</label>
                             <input type="text" class="form-control form-control-sm" id="txt_staffaddress_overview" disabled  >
                        </div>  
                        <div class="form-group col-lg-3 col-sm-6">
                            <label for="join">Joining Date :</label>
                             <input type="text" class="form-control form-control-sm" id="txt_staffjoined_overview"  disabled>
                        </div>

                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="phone">Phone:</label>
                            <input type="text"  disabled class="form-control form-control-sm" id="txt_staffphone_overview"  disabled>
                        </div>
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="emergencycontact">Emergency Phone:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_staffemergencyphn_overview" disabled >
                        </div> 
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="nid">NID/Birth Certificate:</label>
                            <input type="text" disabled class="form-control form-control-sm" id="txt_staffnid_overview"  >
                        </div> 

                        <div class="form-group col-lg-4 col-sm-6">
                           <label for="blood">Blood Group:</label>
                           <input type="text" disabled class="form-control form-control-sm" id="txt_staffblood_overview"  >
                          
                        </div>
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="status">Marital Status:</label>
                            <input type="text" disabled class="form-control form-control-sm" id="txt_staffstatus_overview" >
                        </div>
                        <div class="form-group col-lg-4 col-sm-6">
                            <label for="salary">Salary:</label>
                            <input type="text" class="form-control form-control-sm" id="txt_staffsalary_overview" disabled >
                        </div>
                         <div class="form-group col-lg-6 col-sm-6" id="license_overview" style="display: none">
                            <label for="licenseexpiry">Driving License No.:</label>
                            <input type="text" class="form-control form-control-sm" disabled id="txt_stafflicense_overview"  disabled >
                        </div>
                        <div class="form-group col-lg-6 col-sm-6" id="expires_overview" style="display: none">
                            <label for="licenseexpiry">Driving License Expires:</label>
                            <input type="text" class="form-control form-control-sm" disabled id="txt_staffexpires_overview"  disabled>
                        </div>
                    </div> 
                    <div class="row" id="document">
                    </div> 
        	   </div>  
            <!-- 	
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  data-dismiss="modal" class="btn btn-primary float-right">Close</button>
                </div> -->
           
        </div>
    </div>
</div>    
<script>

    function overview(staffcode){
        var selected_employee_dataset_overview = [];
        selected_employee_dataset_overview = current_employee_dataset.find(function(employee) {
            return employee.staffcode == staffcode;
        }); 
        
        console.log(selected_employee_dataset_overview);
        if(selected_employee_dataset_overview['staffgroup']=="technical"||selected_employee_dataset_overview['designation']=="Driver"){
           
            $('#txt_stafftype_overview').val("Staff");
            if(selected_employee_dataset_overview['designation']=="Driver"){
                $('#txt_stafftype_overview').val("Staff");
                document.getElementById("license_overview").style.display = "block";
                document.getElementById("expires_overview").style.display = "block";
                $('#txt_stafflicense_overview').val(selected_employee_dataset_overview['drivinglicense']);
                $('#txt_staffexpires_overview').val(selected_employee_dataset_overview['licenseexpiry']);
            }else{
                document.getElementById("license_overview").style.display = "none";
                document.getElementById("expires_overview").style.display = "none";
                $('#txt_stafflicense_overview').val("");
                $('#txt_staffexpires_overview').val("");
            }
        }else if(selected_employee_dataset_overview['staffgroup']=="officer"){
            $('#txt_stafftype_overview').val("Officer");
        }
        
        $('#txt_staffdesgination_overview').val(selected_employee_dataset_overview['designation']);

        $('#txt_staffblood_overview').val(selected_employee_dataset_overview['bloodgroup']);
        $('#txt_staffstatus_overview').val(selected_employee_dataset_overview['maritalstatus']);
        $('#txt_staffname_overview').val(selected_employee_dataset_overview['staffname']);
        $('#txt_staffnamebn_overview').val(selected_employee_dataset_overview['staffname_bn']);
        $('#txt_staffsalary_overview').val(selected_employee_dataset_overview['salary']);
        $('#txt_staffaddress_overview').val(selected_employee_dataset_overview['address']);
        $('#txt_staffphone_overview').val(selected_employee_dataset_overview['phone1']);
        $('#txt_staffemergencyphn_overview').val(selected_employee_dataset_overview['emergencycontact']);
        $('#txt_staffjoined_overview').val(selected_employee_dataset_overview['joinedon']);
        $('#txt_staffdob_overview').val(selected_employee_dataset_overview['dob']);
        var dob = selected_employee_dataset_overview['dob'];
        var age = getAge(dob);
      
        $('#txt_staffage_overview').val(age);
        $('#txt_staffnid_overview').val(selected_employee_dataset_overview['nid']);
        $('#txt_staffsalary_overview').val(selected_employee_dataset_overview['salary']);
        var divdocuments;
        $('#document').empty();
        //console.log(selected_employee_dataset_overview['documents'].length);
        if(selected_employee_dataset_overview['documents'].length>0){
            for (var i in selected_employee_dataset_overview['documents']) {
                var imagename = 'https://hydrokleen.com.bd/v1/uploads/'+selected_employee_dataset_overview['documents'][i]['docimgrenamed'];
                var closeimg = 'https://hydrokleen.com.bd/v2/images/close.png';
                var docname = selected_employee_dataset_overview['documents'][i]['doctypename'];
                var doctype = selected_employee_dataset_overview['documents'][i]['doctype'];
                console.log(imagename+docname);
                divdocuments  = '<div class="filtr-item col-sm-4">';
                divdocuments+= '<label>'+docname+'</label>';
                divdocuments+= '<a href="javascript:void(0)" onclick="deleteimage(\''+staffcode+'\',\''+doctype+'\')"><img class="notify-badge" src='+closeimg+'  ></a>';
                divdocuments+= '<a class="umodal__open" href='+imagename+' >';
                divdocuments+= '<img class="img-fluid mb-2" src='+imagename+' style="width:100%;height:auto">';
                divdocuments+= '</a>';
                divdocuments+='</div>';
               
                document.getElementById('document').innerHTML+= divdocuments;
            } 
        }else{
             divdocuments ='<div class="col-12" style="text-align:center">';
             divdocuments += '<h4 >No Document Found</h4>';
             divdocuments +='</div>';   
             document.getElementById('document').innerHTML+= divdocuments;
        }
       
        
        $('#modal_employee_overview').modal('show');
        
    }

    function deleteimage(staffcode,doctype){
        console.log(staffcode+doctype);
        
         Swal.fire({
            title: 'Do you want to Delete Document?',
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
                   url: "<?php echo base_url();?>hradmin/hr/delete_staff_document",
                   method:"POST",
                    data: {
                     'staffcode':staffcode,
                     'doctype':doctype
                    },
                   beforeSend: function(){
                     //$('.loader').show();
                   },
                   complete: function(){
                    //$('.loader').hide();
                   },
                    success:function(data) {
                        console.log(data);
                        if (data==1) {
                            Swal.fire({
                                title: 'Document deleted successfully',
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
    }
    
</script>