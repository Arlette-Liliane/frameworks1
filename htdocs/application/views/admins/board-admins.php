<script type="text/javascript">




	$(document).ready(function(){
        $('#example').DataTable();
        $(".link-delete-admin").click(function(){
        	var id = $(this).attr("value");
    		$.post("ajax_delete_admin",{id:id});
    		$(this).parent("tr").remove();
        });


    });
</script>
<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="page-head-line">ADMIN</h4>

    </div>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th >ID</th>
		<th >Uid</th>
		<th c>Delete</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($admins as $row): ?>
		<tr>
			<td><?php echo $row->id; ?></td>
			<td><?php echo $row->uid; ?></td>
			<td class="td-info-admins link-delete-admin" value="<?php echo $row->id; ?>">Delete</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>
</div>
</div>