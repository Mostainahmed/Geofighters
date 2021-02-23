<section class="content">
    <div class="container-fluid">

        <div class="row pt-3">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item active">Areas</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <div class="col-sm-6">
                <button type="button"
                    class="btn btn-primary btn-sm btn-flat dropdown-toggle dropdown-icon float-sm-right"
                    data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)" onclick="view_regions_modal();"><i
                                class="fas fa-plus fa-xs"></i> Add Regions</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="view_sub_regions_modal();"><i
                                class="fas fa-plus fa-xs"></i> Add Sub-Regions</a>
                        <a class="dropdown-item" href="javascript:void(0)" onclick="view_routes_modal();"><i
                                class="fas fa-plus fa-xs"></i> Add Areas</a>
                    </div>Action
                </button>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row pt-3">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $number_of_regions ?></h3>
                            <p>Regions</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <a href="<?php echo base_url() ?>area/manage_regions" class="small-box-footer">Region
                            Management
                            List
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $number_of_sub_regions ?></h3>
                            <p>Sub Regions</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <a href="<?php echo base_url() ?>area/manage_sub_regions" class="small-box-footer">Sub
                            Region Management <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $number_of_routes ?></h3>
                            <p>Areas</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <a href="<?php echo base_url() ?>area/manage_routes" class="small-box-footer">Area
                            management <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $number_of_distributors ?></h3>
                            <p>Distributors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-truck-loading"></i>
                        </div>
                        <a href="<?php echo base_url() ?>distributor" class="small-box-footer">Manage Distributors <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <!-- Table for Regions -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header ui-sortable-handle">
                            <h3 class="card-title">
                                <i class="fas fa-map-marked mr-1"></i>
                                Regions
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Region ID</th>
                                        <th>Region Name</th>
                                        <th>RSM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sl = 0;
								if (!empty($region_array)) {
									foreach ($region_array as $regions) {
										$sl++ ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td id="<?php echo "region_id" . $sl; ?>"><?php echo $regions['region_id']; ?>
                                        </td>
                                        <td id="<?php echo "region_name" . $sl; ?>">
                                            <?php echo $regions['region_name']; ?>
                                        </td>
                                        <td id="<?php echo "rsm_name" . $sl; ?>"><?php echo $regions['rsm_name']; ?>
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
					<!-- Sub Region Table -->
                    <div class="card">
                        <div class="card-header ui-sortable-handle">
                            <h3 class="card-title">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                Sub Regions
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0" style="max-height: 250px; overflow: auto; display: inline-block;">
                            <table class="table table-sm" style="text-align:center">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Sub Region ID</th>
                                        <th>Sub Region Name</th>
                                        <th>Region Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sl = 0;
								if (!empty($sub_region_array)) {
									foreach ($sub_region_array as $sub_regions) {
										$sl++ ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td id="<?php echo "sub_region_id" . $sl; ?>"><?php echo $sub_regions['sub_region_id']; ?>
                                        </td>
                                        <td id="<?php echo "sub_region_name" . $sl; ?>">
                                            <?php echo $sub_regions['sub_region_name']; ?>
                                        </td>
                                        <td id="<?php echo "region_name" . $sl; ?>"><?php echo $sub_regions['region_name']; ?>
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

    </div>
    <?php $this->load->view('modal/view_modal_add_regions'); ?>
    <?php $this->load->view('modal/view_modal_add_sub_regions'); ?>
    <?php $this->load->view('modal/view_modal_add_routes'); ?>
</section>
<script>
    $('#navtree_acpay').addClass('menu-open').addClass('navtree-rc');
    $('#navlink_acpay').addClass('card-outline card-primary');
    $('#navtree_areas').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
    $('#navlink_areas').addClass('card-outline card-primary');
    $('#navlink_area').addClass('active');
</script>