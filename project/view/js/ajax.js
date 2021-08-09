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
    url:"../Controller/functions.php?method=add",
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