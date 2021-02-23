<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Assign Users</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <button type="button"
                    class="btn btn-primary btn-sm btn-flat dropdown-toggle dropdown-icon float-sm-right"
                    data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="view_assign_rsm();"><i
                                class="fas fa-plus fa-xs"></i> Assign RSM</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="view_assign_user_base_station();"><i
                                class="fas fa-plus fa-xs"></i> Assign Base Station</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="view_assign_asm_to_rsm();"><i
                                class="fas fa-plus fa-xs"></i> Assign ASM to RSM</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="view_assign_tse();"><i
                                class="fas fa-plus fa-xs"></i> Assign TSE</a>
                    </div>Action
                </button>
            </div>
        </div>
        <div class="row pt-0">
            <div class="col-sm-6 col-xs-6 col-lg-6">
                <!-- need to change here in order to mark the nav item-->
            </div>
        </div>
        <!-- <div class="row pt-0">
            <div class="col-12"> -->
        <!-- need to change here in order to mark the nav item -->
        <!-- <table style="width:100%" class="table_assigned_area table-hover table-bordered table-sm text-center">
                </table>
            </div>
        </div> -->
        <div class="row">
            <!-- Table for RSM -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header ui-sortable-handle">
                        <h3 class="card-title">
                            <i class="fas fa-user-tie mr-1"></i>
                            RSM List
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm" style="text-align:center">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>RSM ID</th>
                                    <th>RSM Name</th>
                                    <th>Phone No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sl = 0;
								if (!empty($rsm_list)) {
									foreach ($rsm_list as $rsms) {
										$sl++ ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td id="<?php echo "user_id" . $sl; ?>"><?php echo $rsms['user_id']; ?>
                                    </td>
                                    <td id="<?php echo "full_name" . $sl; ?>">
                                        <?php echo $rsms['full_name']; ?>
                                    </td>
                                    <td id="<?php echo "phone_no" . $sl; ?>"><?php echo $rsms['phone_no']; ?>
                                    </td>
                                </tr>
                                <?php }
								} else { ?>
                                <tr>
                                    <td colspan="5">Record Not Found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-sm-6">
                <!-- ASM Table -->
                <div class="card">
                    <div class="card-header ui-sortable-handle">
                        <h3 class="card-title">
                            <i class="fas fa-user mr-1"></i>
                            ASM List
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0" style="max-height: 250px; overflow: auto; display: inline-block;">
                        <table class="table table-sm" style="text-align:center">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>ASM ID</th>
                                    <th>ASM Name</th>
                                    <th>Phone No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sl = 0;
								if (!empty($asm_list)) {
									foreach ($asm_list as $asms) {
										$sl++ ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td id="<?php echo "user_id" . $sl; ?>">
                                        <?php echo $asms['user_id']; ?>
                                    </td>
                                    <td id="<?php echo "full_name" . $sl; ?>">
                                        <?php echo $asms['full_name']; ?>
                                    </td>
                                    <td id="<?php echo "phone_no" . $sl; ?>">
                                        <?php echo $asms['phone_no']; ?>
                                    </td>
                                </tr>
                                <?php }
								} else { ?>
                                <tr>
                                    <td colspan="5">Record Not Found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Table for TSE -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header ui-sortable-handle">
                        <h3 class="card-title">
                            <i class="fas fa-users mr-1"></i>
                            TSE List
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm" style="text-align:center">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>TSE ID</th>
                                    <th>TSE Name</th>
                                    <th>Phone No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sl = 0;
								if (!empty($tse_list)) {
									foreach ($tse_list as $tses) {
										$sl++ ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td id="<?php echo "user_id" . $sl; ?>"><?php echo $tses['user_id']; ?>
                                    </td>
                                    <td id="<?php echo "full_name" . $sl; ?>">
                                        <?php echo $tses['full_name']; ?>
                                    </td>
                                    <td id="<?php echo "phone_no" . $sl; ?>"><?php echo $tses['phone_no']; ?>
                                    </td>
                                </tr>
                                <?php }
								} else { ?>
                                <tr>
                                    <td colspan="5">Record Not Found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('modal/view_modal_assign_rsm'); ?>
    <?php $this->load->view('modal/view_modal_assign_asm_to_rsm'); ?>
    <?php //$this->load->view('modal/view_modal_assign_daily_route'); ?>
    <?php $this->view('modal/view_modal_assign_base_station'); ?>
</section>
<script>
$('#navtree_acpay').addClass('menu-open').addClass('navtree-rc');
$('#navlink_acpay').addClass('card-outline card-primary');
$('#navtree_authentication').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
$('#navlink_authentication').addClass('card-outline card-primary');
$('#navlink_assign_users').addClass('active');
</script>