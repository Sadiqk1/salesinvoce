<?php include('header.php');
if(isset($_GET['id']) && !empty($_GET['id'])) {
  $id = $_GET['id'];
}
$classobject=new DB_con();
$edit=$classobject->editinvoice($id);
//?>
<div class="container-fluid">
    <h1 class="mt-4">Update Client</h1>

    <form action="database.php?method=edit" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Invoice Id</label>
            <input type="number" name="id" class="form-control" value="<?php echo $id; ?>" id="exampleFormControlInput1" readonly>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Client Name</label>
            <input type="text" name="iname" class="form-control" value="<?php echo $edit['iname']; ?>" id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Phone</label>
            <input type="number" name="phone" class="form-control"  value="<?php echo $edit['phone'];?>"id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input type="text" name="contact" class="form-control" value="<?php echo $edit['contact'];?>"id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Address</label>
            <input type="text" name="addresss" class="form-control" value="<?php echo $edit['addresss']; ?>"id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Date</label>
            <input type="date" class="form-control" name="dat" value="<?php echo $edit['dat'];?>" id="exampleFormControlInput1" >
        </div>
        <input type="submit" name="submit" id="submit" class="button" value="Update"/>
</div>
</form>
</div>
</div>
<!-- Bootstrap core JS-->
<?php include('footer.php') ?>
