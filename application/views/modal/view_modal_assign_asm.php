<div class="modal fade" id="modal_assign_rsm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center">Assign RSM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="frm_assign_user" role="form">
                <div class="modal-body" style="padding:10px 15px 10px 15px;">
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="rsm">RSM Name<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_rsm_name" name="user_id"
                                required="">
                                <option value="">Please Select</option>
                                <?php foreach ($rsm_list as $row) { ?>
                                <option id="user_id" value="<?php echo $row['user_id']; ?>">
                                    <?php echo $row['full_name']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="region_id">Region<span style="color: red;">*</span>:</label>
                            <select required class="form-control form-control-sm" id="ddl_region_name" name="region_id"
                                required="">
                                <option value="">Please Select</option>
                                <?php foreach ($region_array as $row) { ?>
                                <option id="region_id" value="<?php echo $row['region_id']; ?>">
                                    <?php echo $row['region_name']; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" style="float:right" class="btn btn-primary button-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>