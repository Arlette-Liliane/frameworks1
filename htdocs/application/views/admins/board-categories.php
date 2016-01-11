<script type="text/javascript">
	$(document).ready(function(){ 
        $(".link-delete-category").click(function(){
        	var id = $(this).attr("value");
    		$.post("ajax_delete_category",{id:id});
    		$(this).parent("tr").remove();
        });
        $('#example').DataTable();
    });
</script>

<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="page-head-line">CATEGORIES</h4>

    </div>
<div id="block-board-categories">

	<?php echo form_open("admins/add_category", array("id" => "form-add-category")); ?>
		<span id="title-add-category">Add a Category</span>
		<label for="name" id="label-name-category">Name</label>
    	<input type="text" id="input-name-category" name="name" value="<?php echo set_value('name'); ?>" />
    	<input type="submit" id="submit-add-category" value="Add" />
	<?php echo form_close(); ?>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th >Name</th>
		<th >Type</th>
		<th >Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($categories as $row): ?>
		<tr>
			<td class="td-info-categories"><?php echo $row->name; ?></td>
			<td class="td-info-categories"><?php echo $row->type; ?></td>
			<td class="td-info-categories link-delete-category" value="<?php echo $row->id; ?>">Delete</td> 
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>
    </div>