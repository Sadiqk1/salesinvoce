<?php
include ('header.php');

$classobject->deleteinvoice($getid);
?>
    <!-- Page content-->
    <div class="container-fluid">
        <table width="100%"  border="0" >
            <tr>
                <th>Invoice Number</th>
                <th>Client Name</th>
                <th>Contact</th>
                <th>Edit Items</th>
                <th>Add Items</th>
                <th>View Invoice</th>
                <th>Delete</th>
            </tr>
            <?php

            $sql=$classobject->viewinvoice();

            while ($row=mysqli_fetch_array($sql)){ ?>

                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['iname'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><a href="view/edit.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Edit Client</button></a></td>
                    <td><a href="view/additems.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Add Items</button></a></td>
                    <td><a href="view/viewinvoice.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">View Invoice</button></a></td>
                    <td><a href="index.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-success">Delete Invoice </button></a></td>

                </tr>
            <?php }?>
        </table>

    </div>
    </div>
<?php include ('footer.php'); ?>