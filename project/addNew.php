
<?php include('header.php') ?>
        <!-- Page content-->
        <div class="container-fluid">
            <h1 class="mt-4">Add Client</h1>

            <form action="database.php?method=client" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Invoice Id</label>
                    <input type="number" name="id" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Client Name</label>
                    <input type="text" name="iname" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="text" name="contact" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" name="addresss" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Date</label>
                    <input type="date" class="form-control" name="dat" id="exampleFormControlInput1" >
                </div>
                <input type="submit" name="submit" id="submit" class="button" value="Submit"/>
        </div>
        </form>
    </div>
</div>
<!-- Bootstrap core JS-->
<?php include('footer.php') ?>
