<script>
    $(document).ready(function(){
        $('#example').DataTable({
                "pageLength": 50
            }

        );
    });
</script>

<style type="text/css">

    .th-style{
        font-size: 14px;
        font-weight: 500;
    }

    .td-style{
        font-size: 13px;
        font-weight: 400;
        vertical-align: middle;
    }
</style>

<div class="col-lg-12">
    <h3 class="title-5 m-b-35">Inventory Item List</h3>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="background-color: #00A9B1; color: white;">
        <tr >
            <th>SL</th>
            <th>Barcode</th>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>Entry By</th>
            <th>Entry Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sl = 0;
        if(!empty($list))
        foreach ($list as $row) {
            $sl++;
            ?>
            <tr>
                <td><?php echo $sl;?></td>
                <td><img src="<?= base_url('inventory_stock/barcode/'.$row->barcode);?>"/></td>
                <td><?php echo $row->items_name;?></td>
                <td><?php echo $row->itemcode;?></td>
                <td><?php echo $row->created_by;?></td>
                <td><?php echo $row->created_at;?></td>

            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>
