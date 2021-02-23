<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Registration</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="frm_registration">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">Phone</label>
                                <input type="text" name="phone_no" class="form-control" id="exampleInputPhoneNo"
                                    placeholder="Contact No." required>
                            </div>
                            <div class="form-group mb-0">
                                <label>Designation</label>
                                <select class="form-control select2 " name="designation" style="width: 100%;" required>
                                    <option selected="selected" value="RSM">Regional Sales Manager</option>
                                    <option value="ASM">Assistant Sales manager</option>
                                    <option value="TSE">Territory Sales Executive</option>
                                    <option value="ADMIN">System Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername"
                                    placeholder="User name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFullname">Full name</label>
                                <input type="text" name="fullname" class="form-control" id="exampleInputFullname"
                                    placeholder="Full name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputnid">National ID</label>
                                <input type="text" name="nid" class="form-control" id="exampleInputnid"
                                    placeholder="National ID Card number" required>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<script>
$('#frm_registration').on('submit', function(e) {
    e.preventDefault();
    var frm_inventory_requested_product_update = new FormData($('#' + e.target.id)[0]);
    var values = $(this).serialize();
    console.log(values);
    console.log(frm_inventory_requested_product_update);
    //return;

    Swal.fire({
        title: 'Register this user?',
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        allowOutsideClick: false,
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Please Wait...',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            $.ajax({
                url: "<?php echo base_url() ?>authentication/user_registration",
                method: "POST",
                data: frm_inventory_requested_product_update,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    //return;
                    if (data) {
                        Swal.fire({
                            title: 'User Registration successfull',
                            type: 'success',
                        }).then((data) => {
                            location.reload();
                        });
                    } else if (data == 403) {
                        accessDenied();
                    } else if (data == 440) {
                        sessionExpired();
                    } else {
                        somethingWentWrong();
                    }
                },
                error: function(data) {
                    // console.log(data);
                    somethingWentWrong();
                }
            });
        }
    });
});
</script>
<script>
$('#navtree_acpay').addClass('menu-open').addClass('navtree-rc');
$('#navlink_acpay').addClass('card-outline card-primary');
$('#navtree_authentication').addClass('menu-open navtree-rc').css("background-color", "rgb(255,255,255,0.1)");
$('#navlink_authentication').addClass('card-outline card-primary');
$('#navlink_registration').addClass('active');
</script>