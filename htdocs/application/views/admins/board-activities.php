<head>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {

    $("#datepicker").datepicker();
    $("#datepicker2").datepicker();


        $(".link-delete-category").click(function(){

        	var id = $(this).attr("value");
    		$.post("ajax_delete_activite",{id:id});
    		$(this).parent("tr").remove();
        });
    });
</script>
<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="page-head-line">Activities</h4>

    </div>

    <div class="row">
        <div class="col-sm-3" style="background-color:lavender;">
	<?php echo form_open("admins/add_activite", array("id" => "form-add-category" , "enctype" => "multipart/form-data")); ?>
		<span id="title-add-category">Add an Activity</span>
		<label for="name" id="label-name-category">Name</label>
    	<input type="text" id="input-name-category" name="name" value="<?php echo set_value('name'); ?>" />
    	<br/><br/>
    	<label for="start" id="label-name-category">Start</label>
    	<input id="datepicker" name="start"/>
    	<br/><br/>
    	<label for="end" id="label-name-category">End</label>
    	<input id="datepicker2" name="end"/>
    	<br/><br/>
    	<label for="sizegroup" id="label-name-category">Group size</label>
    	<input type="text" id="input-number-modules" name="sizegroup" value="<?php echo set_value('nbplaces'); ?>" />
    	<br/><br/>
    	<label for="nbcorrections" id="label-name-category">Corrections needed</label>
    	<input type="text" id="input-number-modules" name="nbcorrections" value="<?php echo set_value('nbcredits'); ?>" />
    	<br/><br/>
    	<select name="modules">
    		<option value="nochoice">Choose a Module</option>
    		<?php foreach ($modules as $row): ?>
    			<option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
    		<?php endforeach; ?>
    	</select>
        <br/><br/>
        <select name="generator">
        <option value="nochoice">Choose type of generator</option>
        <option value="1"><?php echo "manuel"; ?></option>
        <option value="2"><?php echo "auto"; ?></option>
        </select>
        <br/><br/>
        <select name="type">
        <option value="nochoice">Choose type</option>
        <option value="1"><?php echo "projet"; ?></option>
        <option value="2"><?php echo "examen"; ?></option>
        <option value="3"><?php echo "TD"; ?></option>
        </select>
    	<br/><br/>
    	<textarea id="textarea-description-modules" name="description" placeholder="Write the activity's description..."></textarea>
    	<br/><br/>    
        <INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="99999000000">
        <label for="pdf" id="label-name-category">Import pdf subject: </label>
        <INPUT NAME="userfile" TYPE="file">
        <br/><br/>
    	<input type="submit" id="submit-add-category" value="Add" />
	<?php echo form_close(); ?>
            </div>

        <div class="col-sm-9" style="background-color:lavenderblush;">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
	<tr>
		<th>Name</th>
        <th >Sujet</th>
        <th >Module</th>
        <th >Start</th>
        <th >End</th>
        <th >Group size</th>
        <th >Corrections needed</th>
        <th >Generator</th>
        <th >Type</th>
        <th >Description</th>
        <th >E-Learning</th>
		<th >Delete</th>
        <th >Generate PC</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($activities as $row): ?>
		<tr>
			<td class="td-info-categories"><?php echo $row->name; ?></td>
            <td class="td-info-categories"><a href="<?php echo $row->sujet; ?>" target=_blank><?php echo substr($row->sujet,38); ?></a></td>
            <td class="td-info-categories"><?php echo $row->id_modules; ?></td>
            <td class="td-info-categories"><?php echo $row->start; ?></td>
            <td class="td-info-categories"><?php echo $row->end; ?></td>
            <td class="td-info-categories"><?php echo $row->sizegroup; ?></td>
            <td class="td-info-categories"><?php echo $row->nbcorrections; ?></td>
            <td class="td-info-categories"><?php echo $row->auto; ?></td>
            <td class="td-info-categories"><?php echo $row->type; ?></td>
            <td class="td-info-categories"><?php echo $row->description; ?></td>
            <td class="td-info-categories"><a href="<?php echo base_url(); ?>admins/board_elearning?id=<?php echo $row->id; ?>">Add video</a></td>
			<td class="td-info-categories link-delete-category" value="<?php echo $row->id; ?>">Delete</td>
            <td class="td-info-categories"><a href="<?php echo base_url(); ?>admins/peergenerator">Generate</a></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
           </div>
</div>