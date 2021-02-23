<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Distributor</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <button type="button"
                    class="btn btn-primary btn-sm btn-flat dropdown-toggle dropdown-icon float-sm-right"
                    data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                    <div class="dropdown-menu" role="menu">
                        <!-- <a href="javascript:void(0)" onclick="view_distributor_add();" class="dropdown-item"><i
                                class="fas fa-plus fa-xs"></i> Add New
                            Distributor</a> -->
                        <a href="javascript:void(0)" onclick="view_distributor_profile_modal();" class="dropdown-item"><i
                                class="fas fa-plus fa-xs"></i> Distributor Profile</a>
                    </div>Action
                </button>
            </div>
        </div>
        <div class="row pt-0">
            <div class="col-12">
                <!-- need to change here in order to mark the nav item-->
                <table style="width:100%" class="table_distributor table-hover table-bordered table-sm text-center">
                </table>
            </div>
        </div>

    </div>
    <?php //$this->load->view('modal/view_modal_add_distributor'); ?>
    <?php //$this->load->view('modal/view_modal_update_distributor'); ?>
    <?php $this->load->view('modal/view_modal_distributor_profile'); ?>
</section>
<script>
var sl = 0;
var selected_distributor_dataset = [];
var current_distributor_dataset = [];
$('.table_distributor').DataTable({
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
        url: "<?php echo base_url(); ?>distributor/get_distributor_list_serverside",
        type: 'POST',
        dataFilter: function(data) {
            //console.log(data);
            sl = JSON.parse(data)['start'];
            current_distributor_dataset = JSON.parse(data)['data'];
            return data;
        },
        error: function(err) {
            console.log(err);
        }
    },
    columns: [

        {
            "title": "Distributor Name",
            "data": "distributor_name",
        },
        {
            "title": "Contact No",
            "data": "distributor_phone_no",
        },
        {
            "title": "Distributor ID",
            "data": "distributor_id",
        },

        {
            "title": "Area",
            "data": "assigned_area_name",
            render: function(data, type, service) {
                return data.charAt(0).toUpperCase() + data.slice(1);
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
                distributor_id: "distributor_id"
            },
            render: function(data, type, service) {

                let update_button =
                    '<a class="" href="javascript:void(0)" onclick="update_distributor(\'' + data
                    .distributor_id +
                    '\');"><button type="button" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</button></a>'
                let delete_button =
                    '<a class="" href="javascript:void(0)" onclick="delete_distributor(\'' + data
                    .distributor_id +
                    '\');"><button type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Delete</button></a>';
                return update_button + '&nbsp;' + '&nbsp;' + delete_button;

            }
        },
    ],
    fnInfoCallback: function(oSettings, iStart, iEnd, iMax, iTotal, sPre) {
        return sPre;
    },

});

function delete_distributor(distributor_id) {
    console.log(distributor_id);
    Swal.fire({
        title: 'Do you want to Delete this Distributor?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        allowOutsideClick: false,
    }).then((result) => {
        if (result.value) {
            pleaseWait();
            $.ajax({
                url: "<?php echo base_url() ?>distributor/delete_distributor",
                method: "POST",
                type: "POST",
                data: {
                    'distributor_id': distributor_id
                },
                success: function(data) {
                    // console.log(data);
                    if (data == 403) {
                        accessDenied();
                    } else if (data == 440) {
                        sessionExpired();
                    } else if (data == 1) {
                        Swal.fire({
                            title: 'Distributor Deleted Successfully',
                            type: 'success',
                        }).then((result) => {
                            location.reload();
                        });
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
}
</script>
<script>
$('#navtree_acpay').addClass('menu-open').addClass('navtree-rc');
$('#navlink_acpay').addClass('card-outline card-primary');
$('#navtree_areas').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
$('#navlink_areas').addClass('card-outline card-primary');
$('#navlink_distributor').addClass('active');
</script>