<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Budget Management</li>
                    <li class="breadcrumb-item active">Budget Claim</li>
                </ol>
            </div>
        </div>
        <div class="row pt-0">
            <div class="col-12">
                <!-- need to change here in order to mark the nav item-->
                <table style="width:100%" class="table_accepted_budget_claim table-hover table-bordered table-sm text-center">
                </table>
            </div>
        </div>
    </div>
    <?php $this->load->view('modal/view_modal_detail_travel_cost_panel'); ?>
    <?php //$this->load->view('modal/view_modal_update_region'); ?>
</section>
<script>
var sl = 0;
var selected_budget_claim_dataset = [];
var current_budget_claim_dataset = [];
$('.table_accepted_budget_claim').DataTable({
    processing: true,
    serverSide: true,
    stateSave: true,
    ordering: true,
    hilighting: false,
    responsive: true,
    searching: true,
    lengthMenu: [
        [10, 15, 20, 25, 50, 100, 200, 500],
        [10, 15, 20, 25, 50, 100, 200, 500]
    ],
    ajax: {
        url: "<?php echo base_url(); ?>travel/get_approved_budget_claim_list_serverside",
        type: 'POST',
        dataFilter: function(data) {
            //console.log(data);
            sl = JSON.parse(data)['start'];
            current_budget_claim_dataset = JSON.parse(data)['data'];
            return data;
        },
        error: function(err) {
            console.log(err);
        }
    },
    columns: [
        {
            "title": "User Name",
            "data": "username",
        },
        {
            "title": "Designation",
            "data": "designation",
        },
        {
            "title": "Travel Type",
            "data": "distance_type",
        },
        {
            "title": "Planned Date",
            "data": "planned_date",
            render: function(data, type, service) {
                return $.datepicker.formatDate('dd-M-y', new Date(data.substring(0, 10)));
            }
        },
        {
            "title": "Created Date",
            "data": "created",
            render: function(data, type, service) {
                return $.datepicker.formatDate('dd-M-y', new Date(data.substring(0, 10)));
            }
        },
        {
            "title": "Action",
            "data": {
                travel_plan_id: "travel_plan_id"
            },
            render: function(data, type, service) {

                let details_button = '<a class="" href="javascript:void(0)" onclick="view_travel_cost_detail_modal(\'' +
                    data.travel_plan_id +
                    '\');"><button type="button" class="btn btn-info btn-xs"><i class="fas fa-info" data-target=""></i> Details</button></a>';
                
			 	let image_button = '<a class="umodal__open" href="<?php echo "http://10.10.111.33/geofighters/uploads/bills/";?>'+
                    data.bill_image+' " ><button type="button" class="btn btn-primary btn-xs"><i class="fas fa-image"></i> Voucher</button></a>';
                return details_button+ '&nbsp;' + image_button;
            }
        },
    ],
    fnInfoCallback: function(oSettings, iStart, iEnd, iMax, iTotal, sPre) {
        return sPre;
    },

});
</script>
<script>
$('#navtree_acpay').addClass('menu-open').addClass('navtree-rc');
$('#navlink_acpay').addClass('card-outline card-primary');
$('#navtree_budget_manage').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
$('#navlink_budget_manage').addClass('card-outline card-primary');
$('#navlink_accepted_budget_claim').addClass('active');
</script>