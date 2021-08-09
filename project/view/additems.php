<?php include('../header.php'); ?>
<head>
    <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <br />
    <br />
    <div class="form-group">
        <form name="add_name" id="add_name">
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <input type="hidden" name="id[]" value="<?=$getid; ?>" class="form-control name_list" />
                        <td><input type="text" name="description[]" placeholder="Enter Name" class="form-control name_list" /></td>
                        <td><input type="text" name="amount[]" placeholder="Enter Amount" class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
        </form>
    </div>
</div>
</body>
</html>

    <!-- Bootstrap core JS-->
<?php include('../footer.php'); ?>