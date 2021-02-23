<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Phone</li>
                    <li class="breadcrumb-item active">EBS Phone Stock</li>
                </ol>
            </div>
            <div class="col-sm-6">
				<a href="javascript:void(0)" onclick="view_add_phone_model_stock();" class="btn btn-sm btn-primary addemployeebtn " data-toggle="modal" data-target="#modal_employee_add"><i class="fas fa-plus fa-sm"></i> Add New Stock</a>
			</div>	
        </div>
        <div class="row pt-0">
            <div class="col-12">
                <!-- need to change here in order to mark the nav item-->
                <table style="width:100%" class="table_model_wise_phone_stock table-hover table-bordered table-sm text-center">
                </table>
            </div>
        </div>
    </div>
    <?php $this->load->view('modal/view_modal_add_model_wise_stock'); ?>
</section>
<script>
var sl = 0;
var selected_phone_stock_dataset = [];
var current_phone_stock_dataset = [];
$('.table_model_wise_phone_stock').DataTable({
	processing: true,
	serverSide: true,
	stateSave : true,
	ordering : true,
	hilighting: false,
	responsive: true,
	searching: true,
	lengthMenu: [[10, 15, 20, 25, 50, 100, 200, 500], [10, 15, 20, 25, 50, 100, 200, 500]],
	ajax: {
		url: "<?php echo base_url(); ?>phone/get_phone_stock_list_serverside",
		type: 'POST',
		dataFilter: function(data){
			//console.log(data);
			sl = JSON.parse(data)['start'];
			current_phone_stock_dataset = JSON.parse(data)['data'];
			return data;
		},
		error: function(err){
			console.log(err);
		}
	},
	columns: [

        {
			"title": "Phone ID",
			"data": "phone_id",
		},
        {
			"title": "Model Name",
			"data": "phone_model",
		},
		{
			"title": "In Stock",
			"data": "stock",
		},
		{
			"title": "Stock Date",
			"data": "stock_date",
		},
		{
			"title": "Created By",
			"data": "createdby",
			render: function (data, type, service) {
				return data.charAt(0).toUpperCase() + data.slice(1);
			}
		},
		{
			"title": "Created Date",
			"data": "created",
			render: function (data, type, service) {
				return $.datepicker.formatDate('dd-M-y', new Date(data.substring(0,10)));
			}
		},
		{
			"title": "Action",
			"data": {
                catcode:"catcode"
            },
			 render: function (data, type, service) {
			 	
			 	let edit_button = '<a class="" href="javascript:void(0)" onclick="update_inventory_category(\''+data.catcode+'\');"><button type="button" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</button></a>'
				// let delete_button = '<a class="" href="javascript:void(0)" onclick="delete_inventory_category(\''+data.catcode+'\');"><button type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Delete</button></a>';
			 	// return update_button+'&nbsp;'+'&nbsp;'+delete_button;
				 return edit_button
			 }
		},
		],
		fnInfoCallback: function( oSettings, iStart, iEnd, iMax, iTotal, sPre ) {
		return sPre;
	},
		
} );
</script>
<script>
    $('#navtree_acpay').addClass('menu-open').addClass('navtree-rc');
    $('#navlink_acpay').addClass('card-outline card-primary');
    $('#navtree_stock_management').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
    $('#navlink_stock_management').addClass('card-outline card-primary');
    $('#navlink_phone_stock').addClass('active');
</script>