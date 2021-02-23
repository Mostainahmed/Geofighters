<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">User Management</li>
                    <li class="breadcrumb-item active">Manage Users</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <a href="<?php echo base_url() ?>authentication/registration"
                    class="btn btn-sm btn-primary addemployeebtn"><i class="fas fa-plus fa-sm"></i> Registration</a>
            </div>
        </div>
        <div class="row pt-0">
            <div class="col-12">
                <!-- need to change here in order to mark the nav item-->
                <table style="width:100%" class="table_manage_users table-hover table-bordered table-sm text-center">
                </table>
            </div>
        </div>
    </div>
    <?php $this->load->view('modal/view_modal_update_user'); ?>
</section>
<script>
var sl = 0;
var selected_user_dataset = [];
var current_user_dataset = [];
$('.table_manage_users').DataTable({
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
        url: "<?php echo base_url(); ?>user/get_user_list_serverside",
        type: 'POST',
        dataFilter: function(data) {
            //console.log(data);
            sl = JSON.parse(data)['start'];
            current_user_dataset = JSON.parse(data)['data'];
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
            "title": "Full Name",
            "data": "fullname",
        },
        {
            "title": "Designation",
            "data": "designation",
        },
        {
            "title": "E-mail",
            "data": "email",
        },
        {
            "title": "Base Station",
            "data": "base_station",
        },
        {
            "title": "Phone No",
            "data": "phone_no",
        },
        {
            "title": "National ID",
            "data": "nid",
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
                user_id: "user_id"
            },
            render: function(data, type, service) {

                let edit_button =
                    '<a class="" href="javascript:void(0)" onclick="update_user(\'' + data
                    .user_id +
                    '\');"><button type="button" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</button></a>'
                // let delete_button = '<a class="" href="javascript:void(0)" onclick="delete_inventory_category(\''+data.catcode+'\');"><button type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Delete</button></a>';
                // return update_button+'&nbsp;'+'&nbsp;'+delete_button;
                return edit_button

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
$('#navtree_authentication').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
$('#navlink_authentication').addClass('card-outline card-primary');
$('#navlink_manage_users').addClass('active');
</script>