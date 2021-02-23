

var orderList = [];
var orderListHTML = '';
function addOrder()
{
  var orderItem = {};
  if ( document.getElementById('ddlaclist').value == "") {
    alert('select ac first');
    return;
  }else if ( document.getElementById('ddlservice').value == "") {
    alert('select a service first');
    return;
  }else if ( document.getElementById('txt_price').value == "") {
    alert('Price field is empty');
    return;
  }
  else {
    orderItem['acno'] = document.getElementById('ddlaclist').value;
    orderItem['servicedetails'] = document.getElementById('ddlservice').value;
    orderItem['servicerate'] = document.getElementById('txt_price').value;
      orderItem['comment'] = document.getElementById('txt_customercmnt').value;
    orderList.push(orderItem);
    makeOrderList(orderList);
  }

}

function removeOrderItem(index)
{
  orderList.splice(index,1);
  if (orderList.length > 0) {
    makeOrderList(orderList);
  }else {
    document.getElementById('orderlist').innerHTML = "";
  }

}
function makeOrderList(param)
{
  var slcount = 0;
  var totalbill = 0;


  orderListHTML = '<table class="table table-striped table-bordered" style="width:100%; text-align:center;"><thead style="background-color: #00A9B1; color: white;"><tr><th class="th-style td-center">SL</th><th class="th-style">Ac Code</th><th class="th-style td-center">Service Name</th><th class="th-style td-center">Price</th><th>Action</th></tr></thead><tbody>';
  //orderListHTML = '<table class="col-md-12 table table-striped table-bordered" style="width:100%; text-align:center;"><thead style="background-color: #00A9B1; color: white;"><tr><th>Sl</th><th>AC Code</th><th>Service Name</th><th>Price</th><th>Action</th>';
  for(var i in param){
    slcount++;
    var singleObj = param[i];
    totalbill = totalbill + parseInt(singleObj['servicerate']);
    orderListHTML += '<tr><td>'+ slcount +'</td><td>'+singleObj['acno']+'</td> <td>'+singleObj['servicedetails']+'</td><td>'+singleObj['servicerate']+'</td><td><button id='+i+' onclick="removeOrderItem(this.id)">X</button></td></tr>';
  }
  orderListHTML += '</tbody> ';
  orderListHTML += '</table>';
  orderListHTML += '<br>';

  orderListHTML +='<div class="col-lg-12">';
  orderListHTML +='<div class="row" style="margin-top:15px;">';
  orderListHTML += '<div class="col-lg-3">'; // date picker input
  orderListHTML += '  <div class="form-group">';
  orderListHTML += '      <label for="inputPrice" class="control-label mb-1">Delivery Date</label><span style="color: red;">*</span>';
  orderListHTML += '      <input type="text" id="mydeliverydate" name="txt_deliverydate" class="input-sm form-control-sm form-control" value="">';
  orderListHTML += '  </div>';
  orderListHTML += '  </div>';

  orderListHTML += '<div class="col-lg-2">';
  orderListHTML += '  <div class="form-group">';
  orderListHTML += '    <label for="selectService" class="control-label mb-1">Shift</label><span style="color: red;">*</span>';
  orderListHTML += '  <select name="ddlshift" id="ddlshift" class="form-control-sm form-control">';
  orderListHTML += '    <option value="morning">Morning</option>';
  orderListHTML += '    <option value="afternoon">Afternoon</option>';
  orderListHTML += '  </select>';
  orderListHTML += '</div>';
  orderListHTML += '</div>';

  orderListHTML += '  <div class="col-lg-3">';
  orderListHTML += '  <div class="form-group">'; // Remarks
  orderListHTML += '      <label for="inputCustomer" class="control-label mb-1">Remarks</label>';
  orderListHTML += '      <input type="text" id="txt_remarks" name="txt_remarks" class="input-sm form-control-sm form-control" value="">';
  orderListHTML += '  </div>';
  orderListHTML += '</div>';

  orderListHTML += '  <div class="col-lg-3">';
  orderListHTML += '  <div class="form-group">'; // Total Bill
  orderListHTML += '      <label for="inputCustomer" class="control-label mb-1">Total Bill</label><span style="color: red;">*</span>';
  orderListHTML += '      <input type="text" id="txt_totalbill" name="txt_totalbill" class="input-sm form-control-sm form-control" style="font-size:18px;" readonly="true" value="'+totalbill+'">';
  orderListHTML += '  </div>';
  orderListHTML += '</div>';

  orderListHTML += '<br>';
  orderListHTML += '  <div class="col-lg-12" >';
  orderListHTML += '  <div class="form-group">'; // Total Bill
  orderListHTML += '<div class="btn btn-info" style="float:right;" onclick="placeOrder();" >Place Order</div>';
  orderListHTML += '  </div>';
  orderListHTML += '</div>';
  orderListHTML += '</div>';
  orderListHTML += '</div>';
  //orderListHTML += '<div>Total Bill Amount:'+totalbill;
  orderListHTML += '</div>';

  document.getElementById('orderlist').innerHTML = orderListHTML;
  addDatePicker();

}
function placeOrder()
{
  if ( document.getElementById('mydeliverydate').value == "") {
    alert('Delivery date is empty');
    return;
  }
  if (orderList.length > 0) {

    if (confirm("Do you want to confirm order?")) {
      $.ajax({
        url: "<?php echo $baseurl;?>services/placeorder",
        type: "POST",
        data: {
          'orderList': orderList,
          'clientid': document.getElementById('client_id').value,
          'deliverydate': document.getElementById('mydeliverydate').value,
          'slot': document.getElementById('ddlshift').value,
          'totalbill': document.getElementById('txt_totalbill').value,
          'remarks': document.getElementById('txt_remarks').value
        },
        beforeSend: function(){
          $('#loader-icon').show();
        },
        complete: function(){
          $('#loader-icon').hide();
        },
        success: function(data){
          console.log(data);
          var obj = JSON.parse(data);
          if(obj['status'] == 'success'){
            orderList = [];
            document.getElementById('orderlist').innerHTML = "";
            swal("Good job!", obj['massage'], "success");
          } else {
            swal("Aww snap!", "Something Went Wrong!", "error");
          }
        },
        error: function() {

        }
      });
    } else {

    }

  }else {
    swal("Aww snap!", "Order list is empty", "error");
  }

}
function editAddr(addrid, clientid){
  document.getElementById('divaddressname').innerHTML = "Update Address";
  document.getElementById('btnaddressname').value = "Update Address";
  $.ajax({
    url: "<?php echo $baseurl;?>user/editaddress",
    type: "POST",
    data: {
      'addressid': addrid
    },
    beforeSend: function(){
      $('#loader-icon').show();
    },
    complete: function(){
      $('#loader-icon').hide();
    },
    success: function(data){

      var obj = JSON.parse(data);
      document.getElementById('floor').value=obj['floor'];
      document.getElementById('flatno').value=obj['flatno'];
      document.getElementById('roadno').value=obj['roadno'];
      document.getElementById('block').value=obj['block'];
      document.getElementById('section').value=obj['section'];
      document.getElementById('areaname').value=obj['areaname'];
      document.getElementById('landmark').value=obj['landmark'];
      document.getElementById('liftfloor').value=obj['liftfloor'];
      document.getElementById('houseno').value=obj['houseno'];
      document.getElementById('postalcode').value=obj['postcode'];
      document.getElementById('extrainfo').value=obj['extra'];
    },
    error: function() {

    }
  });

}

function deleteAddr(addrid, clientid){
  //alert('address id: '+addrid+ "Client id: "+clientid);

  if (confirm("Do you want to delete this address?")) {
    $.ajax({
      url: "<?php echo $baseurl;?>user/deleteaddress",
      type: "POST",
      data: {
        'clientid': clientid,
        'addressid': addrid
      },
      beforeSend: function(){
        $('#loader-icon').show();
      },
      complete: function(){
        $('#loader-icon').hide();
      },
      success: function(data){
        console.log(data);
        if(data == 'success'){
          swal("Done", 'Client address deleted successfully', "success");
          swal("Done", "Client address deleted successfully", "success").then((value) => {
            document.location = '<?php echo $baseurl; ?>user/overview/'+clientid;
            exit;
          });

        } else {
          swal("Aww snap!", "Something Went Wrong!", "error");
        }
      },
      error: function() {

      }
    });
  } else {

  }

}

function addDatePicker()
{
  $( function() {
      $( "#mydeliverydate" ).datepicker();
    } );
}
