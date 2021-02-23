  <div class="modal fade" id="modal_invoice_add">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Invoice</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="padding:10px 15px 10px 15px;">

        <div class="row">
          <div class="col-lg-12">
            <h4 style="text-align:center ">Invoice</h4>
          </div>
          <div class="form-group col-lg-4 col-sm-6">
            <label for="vendor">Vendor/Supplier<span style="color: red;">*</span>:</label>
            <select required class="form-control form-control-sm"
            id="ddl_invoicevendor_new" name="vendor" required="" >
            <option value="">Please Select</option>
            <?php foreach($vendorlist as $row){ ?>
              <option value="<?php echo $row['vendor_code'];?>"><?php echo $row['vendor_name'];?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group col-lg-4 col-sm-6">
          <label for="purchase">Purchased By<span style="color: red;">*</span>:</label>
          <select required class="form-control form-control-sm"
          id="ddl_invoicepurchasedby_new" name="staffname" required="" >
          <option value="">Please Select</option>
          <option value="Inzamamul Haque">Inzamamul Haque</option>
          <option value="Abdullah Al Soud">Abdullah Al Soud</option>
          <option value="Md.Badal Mia">Md.Badal Mia</option>
          <option value="Md.Shafiqul Islam">Md.Shafiqul Islam</option>
        </select>
      </div>
      <div class="form-group col-lg-4 col-sm-6">
        <label for="chalan">Challan no<span style="color: red;">*</span>:</label>
        <input type="text" class="form-control form-control-sm" id="txt_invoicechallanno_new" name="challan" required="">
      </div>
      <div class="form-group col-lg-4 col-sm-6">
        <label for="chalan">Purchase Date<span style="color: red;">*</span>:</label>
        <input type="text" class="form-control form-control-sm" id="txt_invoicepurchasedate_new" name="purchase" required="">

      </div>
      <div class="form-group col-lg-4 col-sm-6">
        <form method="post" id="invoiceimageupload" enctype="multipart/form-data">
          <label for="status">Status<span style="color: red;">*</span>:</label>
          <select required class="form-control form-control-sm"
          id="ddl_invoicepurchasestatus_new" name="purchasestatus" required="" >
          <option value="">Please Select</option>
          <option value="Due">Due</option>
          <option value="Paid">Paid</option>
        </select>
      </form>
      </div>
      <div class="form-group col-lg-4 col-sm-6">
        <label for="inventorytype">Upload Invoice image<span style="color: red;">*</span>:</label>
        <input type="file" id="file_invoice_add" style="outline: none;" name = "image_file" class=" form-control-file form-control-sm " required="" >
      </div>
    </div>

  <div class="row">
    <div class="col-lg-12">
      <h4 style="text-align:center ">Add invoice items</h4>
    </div>
    <div class="form-group col-lg-4 col-sm-6">
      <label for="type">Inventory Type<span style="color: red;">*</span>:</label>
      <select required class="form-control form-control-sm"
      id="ddl_invoicetype_new" name="choosetype">
      <option value="">Please Select</option>
      <?php foreach($catlist as $row){ ?>
        <option value="<?php echo $row['catcode'];?>"><?php echo $row['catname'];?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group col-lg-4 col-sm-6">
    <label for="inventoryitem">Choose Item<span style="color: red;">*</span>:</label>
    <select required="" class="form-control form-control-sm"
    id="ddl_invoiceitem_new" name="chooseitem" >
    <option value="">Please Select</option>

  </select>
  <input id="txt_invoiceitemcode_new" name="itemcode" type="hidden" class="input-sm form-control-sm form-control" readonly>
  </div>
  <div class="form-group col-lg-4 col-sm-6">
    <label for="chalan">Quantity<span style="color: red;">*</span>:</label>
    <input type="text" class="form-control form-control-sm" id="txt_invoicequantity_new" name="choosequantity" required="">

  </div>
  <div class="form-group col-lg-4 col-sm-6">
    <label for="item">Unit<span style="color: red;">*</span>:</label>
    <select  class="form-control form-control-sm"
    id="ddl_invoiceyunit_new" name="chooseunit" readonly >
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
  <div class="form-group col-lg-4 col-sm-6">
    <label for="chalan">Rate<span style="color: red;">*</span>:</label>
    <input type="text" class="form-control form-control-sm" id="txt_invoicerate_new" name="rate" required="">

  </div>
  <div class="col-lg-12">
    <button type="submit" style="float:right"  onclick="additem()" class="btn btn-primary button-sm">Add Item</button>
  </div>
  </div>

      <div class="row justify-content-center">
        <div class="col-lg-6 ">
          <div id="emptyitem" style="text-align: center;padding:5px"><h5>No invoice item added yet.</h5></div>
        </div>
        <div class="col-lg-12 mt-2" >
          <div id="invoiceitemlist">
          </div>
        </div>
      </div>

  </div>


  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" onclick="addinvoice();">Save Invoice</button>
  </div>

  </div>
  </div>
  </div>
<script>

var invoiceList = [];
var invoiceListHTML = '';
var flagpreviousitem = false;
var indexofItem;
//Ddeclared by Zahid for set choose item unit
var chooseItemList = [];
var chooseItemUnitList = [];
var chooseItemCodeList = [];
$( function() {

  $( "#txt_invoicepurchasedate_new" ).datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange:  '2004:+nn',
    onSelect: function() {
      selected = $(this).val();
    }
  });

});
function view_invoice_modal(){
  $('#modal_invoice_add').modal('show');
}

$("#ddl_invoicetype_new").change(function() {

  if (document.getElementById('ddl_invoicetype_new').value == "") {

    var selectitem = document.getElementById("ddl_invoicetype_new");
    selectitem.innerHTML = "";

  } else {
    var item_code = document.getElementById('ddl_invoicetype_new').value;

    var selectitem = document.getElementById("ddl_invoiceitem_new");
    selectitem.innerHTML = "";
    chooseItemList = [];
    chooseItemUnitList = [];
    $.ajax({
      url: "<?php echo base_url(); ?>purchase/invoice/get_inventory_items",
      type: "POST",
      data: {
        'itemcode': item_code
      },
      beforeSend: function(){
        pleaseWait();
      },
      complete: function(){
        Swal.close();
      },
      success: function(data){
        var itemlist = JSON.parse(data);
        var select = document.getElementById("ddl_invoiceitem_new");
        $('#ddl_invoiceitem_new').attr('required', true);
        select.innerHTML = "";
        select.innerHTML += "<option value=''>Please Select</option>";
        // Populate list with options:
        for (var i in itemlist) {
          var option = document.createElement("option");
          chooseItemCodeList.push(itemlist[i]['itemcode']);
          chooseItemList.push(itemlist[i]['itemname']);
          chooseItemUnitList.push(itemlist[i]['unit']);
         
          var itemname = itemlist[i]['itemname'];
          option.value = itemname;
          option.innerHTML = itemname;

          document.getElementById('ddl_invoiceitem_new').appendChild(option);
        }
      },
      error: function() {

      }
    });
  }

});

$("#ddl_invoiceitem_new").change(function() {

  var selecteditemname = document.getElementById('ddl_invoiceitem_new');
  selecteditemname = selecteditemname.options[selecteditemname.selectedIndex].text;
  var indexofItem = chooseItemList.indexOf(selecteditemname);
  document.getElementById('txt_invoiceitemcode_new').value = chooseItemCodeList[indexofItem];
  var val = $('#txt_invoiceitemcode_new').val();
 
  for (var i = 0; i < ddl_invoiceyunit_new.options.length; i++) {
    console.log(i);
    var selectedunit = chooseItemUnitList[indexofItem];
    console.log(selectedunit);
    if (ddl_invoiceyunit_new.options[i].text == selectedunit) {
      ddl_invoiceyunit_new.options[i].selected = true;
    }
  }

});
function additem(){
  if(document.getElementById('ddl_invoicetype_new').value == ""){
    toastr.error('Please select inventory type');
  } else if(document.getElementById('ddl_invoiceitem_new').value == ""){
    toastr.error('Please select item');
  }else if(document.getElementById('txt_invoicequantity_new').value == ""){
    toastr.error('Please select quantity');
  }else if(document.getElementById('txt_invoicerate_new').value == ""){
    toastr.error('Please select rate');
  }else{
    var invoiceItem = {};
    invoiceItem['itemcode'] = document.getElementById('txt_invoiceitemcode_new').value;
    invoiceItem['item'] = document.getElementById('ddl_invoiceitem_new').value;
    invoiceItem['qty'] = document.getElementById('txt_invoicequantity_new').value;
    invoiceItem['rate'] = document.getElementById('txt_invoicerate_new').value;
    invoiceItem['unit'] = document.getElementById('ddl_invoiceyunit_new').value;
    invoiceItem['ammount'] =Math.ceil(document.getElementById('txt_invoicequantity_new').value * document.getElementById('txt_invoicerate_new').value);
    console.log( invoiceItem['itemcode']);
    for(i=0;i<invoiceList.length;i++){
       if(invoiceList[i]['item']== invoiceItem['item']){
        console.log(invoiceList[i]['itemcode']+invoiceItem['itemcode']);
          flagpreviousitem = true;
          indexofItem = i;
          break;
       }
    }
    
    if(isNormalInteger(invoiceItem['qty'])== false){
       toastr.error('Quantity must be greater then 0 and without decimal number');
    }else if(isNormalInteger(invoiceItem['rate'])== false){
      toastr.error('Rate must be greater then 0 and without decimal number');
    }else{
      if(flagpreviousitem==true){
        invoiceList[i]['qty'] = parseInt(invoiceList[i]['qty']) + parseInt(invoiceItem['qty']);
        console.log(invoiceList[i]['qty']);
        invoiceList[i]['ammount'] += invoiceItem['ammount'];
        flagpreviousitem = false;
        makeInvoiceList(invoiceList);
      }else{
        invoiceList.push(invoiceItem);
        makeInvoiceList(invoiceList);
      }
    }
  }
}

function isNormalInteger(str) {
  // return /^\+?(0|[1-9]\d*)$/.test(str);
  var ival=parseInt(str);
  return str != NaN && str >= 0 && str == parseFloat(str);
}

function makeInvoiceList(param){
  console.log(param);
  var slcount = 1;
  var totalammount = 0;
  if(param.length>0){

    invoiceListHtml= '<table class="table  table-bordered table-sm" style="width:100%;text-align: center;">';
    invoiceListHtml+='<tr>';
    invoiceListHtml+='<th>Sl.</th>';
    invoiceListHtml+='<th>Description</th>';
    invoiceListHtml+='<th>Quantity</th>';
    invoiceListHtml+='<th>Rate (Tk.)</th>';
    invoiceListHtml+='<th>Ammount (Tk.)</th>';
    invoiceListHtml+='<th>Action</th>';
    invoiceListHtml+='</tr>';
    invoiceListHtml += '<tbody>';
    for (var row in param) {
      totalammount += param[row]['ammount'];
      invoiceListHtml+='<tr>';
      invoiceListHtml += '<td>'+slcount+'</td>';
      invoiceListHtml += '<td>'+param[row]['item']+'</td>';
      invoiceListHtml += '<td>'+param[row]['qty']+'</td>';
      invoiceListHtml += '<td>'+param[row]['rate']+'</td>';
      invoiceListHtml += '<td>'+param[row]['ammount']+'</td>';
      invoiceListHtml += '<td  ><a   id="'+slcount+'" onclick="removeOrderItem('+slcount+')"><div title="Delete?"><i class="fas fa-trash-alt "></i></div></a></td>';
      invoiceListHtml+='</tr>';
      slcount++;
    }
    totalammount = Math.ceil(totalammount);
    var ammountwords = convertNumberToWords(totalammount);
    invoiceListHtml += '<tr><td></td><td><b>Taka In Words : ' + ammountwords + ' Taka' + '</b></td><td></td><td></td><td class="td-center"><b style="color:red">Total : ' + totalammount +' Taka' +'</b><td></td></td></tr>';
    invoiceListHtml += '</tbody>';
    invoiceListHtml +='</table>';
    document.getElementById('invoiceitemlist').innerHTML = '';
    document.getElementById('emptyitem').style.display = "none";
    document.getElementById('invoiceitemlist').innerHTML = invoiceListHtml;
  }


}

  function removeOrderItem(index){
    console.log(index+invoiceList.length);
    invoiceList.splice(index-1, 1);
    if (invoiceList.length > 0) {
      makeInvoiceList(invoiceList);
    }else{
      document.getElementById('invoiceitemlist').innerHTML = "";
      document.getElementById('emptyitem').style.display = "block";
    }
  }
  function addinvoice(){

    if(document.getElementById('ddl_invoicevendor_new').value == ""){
      toastr.error('Please select a vendor');
    } else if (document.getElementById('ddl_invoicepurchasedby_new').value == "") {
      toastr.error('Please select purchase officer');
    } else if (document.getElementById('txt_invoicechallanno_new').value == "") {
      toastr.error('Please add challan no.');
    } else if (document.getElementById('txt_invoicepurchasedate_new').value == "") {
      toastr.error('Please select purchase date');
    } else if (document.getElementById('ddl_invoicepurchasestatus_new').value == "") {
      toastr.error('Please select purchase status');
    }else if ($('#file_invoice_add').val() == '') {
      toastr.error('Please select invoice image');
    } else if(invoiceList.length==0) {
      toastr.error('Please add invoice item');
    }else{

      var form = $('#frm_invoice_add_new')[0];
      var invoicedata = new FormData(form);
    
      var vendor = document.getElementById('ddl_invoicevendor_new').value;
      var purchaseby = document.getElementById('ddl_invoicepurchasedby_new').value;
      var challanno = document.getElementById('txt_invoicechallanno_new').value;
      var status = document.getElementById('ddl_invoicepurchasestatus_new').value;
      var invoiceimage = document.getElementById('file_invoice_add').value;
      var purchasedate = document.getElementById('txt_invoicepurchasedate_new').value;

    
      console.log(vendor+purchasedate+challanno+status+invoiceimage+purchasedate);
      var invoicelist = JSON.stringify(invoiceList);
      console.log(invoicelist);
      invoicedata.append('vendor',vendor);
      invoicedata.append('purchaseby',purchaseby);
      invoicedata.append('challanno',challanno);
      invoicedata.append('purchasedate',purchasedate);
      invoicedata.append('status',status);
      invoicedata.append('invoicelist',invoicelist);

      var values = $(this).serialize();
      console.log(invoicedata);
      //return;
      Swal.fire({
        title: 'Do you want to Save New Invoice ?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        allowOutsideClick: false,
      }).then((result) => {
        if (result.value) {
          pleaseWait();
          $.ajax({
            url: "<?php echo base_url() ?>purchase/invoice/add_invoice_list",
            method: "POST",
            data: {
              'vendor': vendor,
              'purchaseby': purchaseby,
              'challanno': challanno,
              'purchasedate': purchasedate,
              'status': status,
              'invoiceimage': invoiceimage,
              'invoicelist':invoiceList,
              'imagedata':invoicedata
            },
            data: invoicedata,
            processData: false,
            contentType: false,
            success:function(data) {
              console.log(data);
             // if (data==403) {
             //   accessDenied();
             //  } else if (data==440) {
             //      sessionExpired();
             //  } else if (data==1) {
             //      Swal.fire({
             //          title: 'Invoice saved successfully',
             //          type: 'success',
             //      }).then((result) => {
             //          location.reload();
             //      });
             //  } else {
             //      somethingWentWrong();
             //  }
             
            },
            error: function(data) {
              // console.log(data);
              somethingWentWrong();
            }
          });
        }
      });
    }
  }


  function convertNumberToWords(ammount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    ammount = ammount.toString();
    var atemp = ammount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
      var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
      var received_n_array = new Array();
      for (var i = 0; i < n_length; i++) {
        received_n_array[i] = number.substr(i, 1);
      }
      for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
        n_array[i] = received_n_array[j];
      }
      for (var i = 0, j = 1; i < 9; i++, j++) {
        if (i == 0 || i == 2 || i == 4 || i == 7) {
          if (n_array[i] == 1) {
            n_array[j] = 10 + parseInt(n_array[j]);
            n_array[i] = 0;
          }
        }
      }
      value = "";
      for (var i = 0; i < 9; i++) {
        if (i == 0 || i == 2 || i == 4 || i == 7) {
          value = n_array[i] * 10;
        } else {
          value = n_array[i];
        }
        if (value != 0) {
          words_string += words[value] + " ";
        }
        if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
          words_string += "Crores ";
        }
        if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
          words_string += "Lakhs ";
        }
        if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
          words_string += "Thousand ";
        }
        if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
          words_string += "Hundred and ";
        } else if (i == 6 && value != 0) {
          words_string += "Hundred ";
        }
      }
      words_string = words_string.split("  ").join(" ");
    }
    return words_string;
  }

  </script>
