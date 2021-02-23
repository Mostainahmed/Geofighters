<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row pt-3" id="print_the_upper_row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $user_count ?></h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?php echo base_url() ?>user/manage_users" class="small-box-footer">Manage Users <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $total_cost_behind_employees[0]->total_budget_claim." BDT" ?></h3>
                        <p>Cost of Sales Force</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-money-bill-wave-alt"></i>
                    </div>
                    <a href="<?php echo base_url() ?>travel/budget_claim" class="small-box-footer">Budget Claim <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $total_tour_completed ?></h3>
                        <p>Completed Tour</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-route"></i>
                    </div>
                    <a href="<?php echo base_url() ?>travel" class="small-box-footer">Manage Travel Plan <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>5000</h3>
                        <p>Phone in Stock</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fan"></i>
                    </div>
                    <a href="#" class="small-box-footer">Stock Management <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row" id="print_this_row">
            <section class="col-sm-6">
                <div class="card">
                    <div class="card-header ui-sortable-handle">
                        <h3 class="card-title">
                            <i class="fas fa-chart-area mr-1"></i>
                            New Customer
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#user_acquisition_retail"
                                        data-toggle="tab">Retail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#user_acquisition_corp" data-toggle="tab">Corporate</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="user_acquisition_retail">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="cnv_user_acquisition_retail" class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="chart tab-pane" id="user_acquisition_corp">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="cnv_user_acquisition_corp" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-sm-6">
                <div class="card">
                    <div class="card-header ui-sortable-handle">
                        <h3 class="card-title">
                            <i class="fas fa-file-invoice-dollar"></i>
                            Sales
                        </h3>
                        <div class="card-tools">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#sales_retail" data-toggle="tab">Retail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sales_corp" data-toggle="tab">Corporate</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <div class="chart tab-pane active" id="sales_retail">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="cnv_sales_retail" class="chartjs-render-monitor"></canvas>
                            </div>
                            <div class="chart tab-pane" id="sales_corp">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="cnv_sales_corp" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
<script>
$('#navtree_acpay').addClass('menu-open').addClass('navtree-rc');
$('#navlink_acpay').addClass('card-outline card-primary');
$('#navtree_dashboard').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
$('#navlink_dashboard').addClass('card-outline card-primary');
$('#navlink_dashboard').addClass('active');
</script>


