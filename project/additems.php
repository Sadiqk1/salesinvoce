<?php
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<?php include('header.php'); ?>
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
                        <input type="hidden" name="id[]" value="<?=$id; ?>" class="form-control name_list" />
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

<script>
    $(document).ready(function(){
        var i=1;
        $('#add').click(function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'"><input type="hidden" name="id[]" value="<?= $id; ?>" class="form-control name_list" /><td><input type="text" name="description[]" placeholder="item name" class="form-control name_list" /></td><td><input type="text" name="amount[]" placeholder="Enter Amount" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
        $('#submit').click(function(){
            $.ajax({
                url:"database.php?method=add",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
</script>
    <!-- Bootstrap core JS-->
<?php include('footer.php') ?>