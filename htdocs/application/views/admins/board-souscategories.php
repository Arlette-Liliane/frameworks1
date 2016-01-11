<script type="text/javascript">
	$(document).ready(function(){ 
        $(".link-delete-category").click(function(){
        	var id = $(this).attr("value");
    		$.post("ajax_delete_souscategory",{id:id});
    		$(this).parent("tr").remove();
        });
        $('#example').DataTable();
    });
</script>
<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="page-head-line">SOUS CATEGORIES</h4>

    </div>
<div id="block-board-categories">

	<?php echo form_open("admins/add_souscategory", array("id" => "form-add-category")); ?>
		<span id="title-add-category">Add a child Category</span>
		<label for="name" id="label-name-category">Name</label>
    	<input type="text" id="input-name-category" name="name" value="<?php echo set_value('name'); ?>" />
    	<select name="categories">
    		<option value="nochoice">Choose a category</option>
    		<?php foreach ($categories as $row): ?>
    			<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
    		<?php endforeach; ?>
    	</select>
    	<input type="submit" id="submit-add-category" value="Add" />
	<?php echo form_close(); ?>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th >Name</th>
		<th >Category</th>
		<th >Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($souscategories as $row): ?>
		<tr>
			<td class="td-info-categories"><?php echo $row->name; ?></td>
			<td class="td-info-categories"><?php echo $row->cname; ?></td>
			<td class="td-info-categories link-delete-category" value="<?php echo $row->id; ?>">Delete</td> 
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>