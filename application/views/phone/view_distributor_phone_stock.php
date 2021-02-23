<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Stock Management</li>
                    <li class="breadcrumb-item active">Distributor Phone Stock</li>
                </ol>
            </div>
            <div class="col-sm-6">
				<a href="javascript:void(0)" onclick="view_distributor_stock_add();" class="btn btn-sm btn-primary addemployeebtn " data-toggle="modal" data-target="#modal_employee_add"><i class="fas fa-plus fa-sm"></i> Add New Stock</a>
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
    <?php $this->load->view('modal/view_modal_add_stock_to_distributor'); ?>
</section>
<script>
    $('#navtree_acpay').addClass('menu-open').addClass('navtree-rc');
    $('#navlink_acpay').addClass('card-outline card-primary');
    $('#navtree_stock_management').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
    $('#navlink_stock_management').addClass('card-outline card-primary');
    $('#navlink_distributor_phone_stock').addClass('active');
</script>