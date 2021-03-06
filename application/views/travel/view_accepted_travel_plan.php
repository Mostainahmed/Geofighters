<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Budget Management</li>
                    <li class="breadcrumb-item active">Accepted Travel Plan</li>
                </ol>
            </div>
            <!-- <div class="col-sm-6">
                <a href="javascript:void(0)" onclick="view_travel_plan_modal();"
                    class="btn btn-sm btn-primary addemployeebtn " data-toggle="modal"
                    data-target="#modal_travel_plan"><i class="fas fa-plus fa-sm"></i> Add Travel Plan</a>
            </div> -->
        </div>
        <div class="row pt-0">
            <div class="col-12">
                <!-- need to change here in order to mark the nav item-->
                <table style="width:100%" class="table_accepted_travel_plan table-hover table-bordered table-sm text-center">
                </table>
            </div>
        </div>
    </div>
    <?php //$this->load->view('modal/view_modal_add_regions'); ?>
    <?php //$this->load->view('modal/view_modal_update_region'); ?>
</section>
<script>
var sl = 0;
var selected_travel_plan_dataset = [];
var current_travel_plan_dataset = [];
$('.table_accepted_travel_plan').DataTable({
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
        url: "<?php echo base_url(); ?>travel/get_accepted_travel_plan_list_serverside",
        type: 'POST',
        dataFilter: function(data) {
            //console.log(data);
            sl = JSON.parse(data)['start'];
            current_travel_plan_dataset = JSON.parse(data)['data'];
            return data;
        },
        error: function(err) {
            console.log(err);
        }
    },
    columns: [

        {
            "title": "User ID",
            "data": "user_id",
        },
        {
            "title": "User Name",
            "data": "username",
        },
        {
            "title": "Designation",
            "data": "designation",
        },
        {
            "title": "Base station",
            "data": "base_station",
        },
        {
            "title": "Destination",
            "data": "sub_region_name",
        },
        {
            "title": "Route IDS",
            "data": "route_ids",
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
        }
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
$('#navlink_accepted_travel_plan').addClass('active');
</script>