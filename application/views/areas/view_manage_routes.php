<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Areas</li>
                    <li class="breadcrumb-item active">Manage Areas</li>
                </ol>
            </div>
            <div class="col-sm-6">
				<a href="javascript:void(0)" onclick="view_routes_modal();" class="btn btn-sm btn-primary addemployeebtn " data-toggle="modal" data-target="#modal_employee_add"><i class="fas fa-plus fa-sm"></i> Add Area</a>
			</div>	
        </div>
        <div class="row pt-0">
            <div class="col-12">
                <!-- need to change here in order to mark the nav item-->
                <table style="width:100%" class="table_manage_routes table-hover table-bordered table-sm text-center">
                </table>
            </div>
        </div>
    </div>
    <?php $this->load->view('modal/view_modal_add_routes'); ?>
    <?php $this->load->view('modal/view_modal_update_routes'); ?>
</section>
<script>
var sl = 0;
var selected_routes_dataset = [];
var current_routes_dataset = [];
$('.table_manage_routes').DataTable({
	processing: true,
	serverSide: true,
	stateSave : true,
	ordering : true,
	hilighting: false,
	responsive: true,
	searching: true,
	lengthMenu: [[10, 15, 20, 25, 50, 100, 200, 500], [10, 15, 20, 25, 50, 100, 200, 500]],
	ajax: {
		url: "<?php echo base_url(); ?>area/get_routes_list_serverside",
		type: 'POST',
		dataFilter: function(data){
			//console.log(data);
			sl = JSON.parse(data)['start'];
			current_routes_dataset = JSON.parse(data)['data'];
			return data;
		},
		error: function(err){
			console.log(err);
		}
	},
	columns: [

        {
			"title": "Area ID",
			"data": "assigned_area_id",
		},
        {
			"title": "Area Details",
			"data": "assigned_area_name",
		},
        {
			"title": "Region Name",
			"data": "region_name",
		},
        {
			"title": "Sub Region Name",
			"data": "sub_region_name",
		},
		{
			"title": "RSM Name",
			"data": "rsm_name",
		},
        {
			"title": "ASM Name",
			"data": "asm_name",
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
                assigned_area_id:"assigned_area_id"
            },
			 render: function (data, type, service) {
			 	
			 	let edit_button = '<a class="" href="javascript:void(0)" onclick="update_routes(\''+data.assigned_area_id+'\');"><button type="button" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</button></a>'
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
    $('#navtree_areas').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
    $('#navlink_areas').addClass('card-outline card-primary');
    $('#navlink_route_management').addClass('active');
</script>