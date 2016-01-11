<script>
$(document).ready(function(){
	$("#submit-add-thread").click(function(){
		var idsouscategory = $("#input-category-thread").attr("value");
		var subject = $("#input-subject-thread").val();
		var description = $("#textarea-description-thread").val();

        if (!subject || !description)
         alert("Error");
        else
        {
            $.post("forum/ajax_add_thread",{idsouscategory:idsouscategory, subject:subject, description:description}, function(result){
                $('#myModal').modal('hide');
                //$("#block-list-threads").html(result);


            });
        }

	});
	$(".block-this-thread").click(function(){
		var idthread = $(this).attr("value");
		$.post("forum/ajax_this_thread",{idthread:idthread}, function(result){
    		$("#block-threads-forum").html(result);
    	});	
	});
    $("#delete_thread").click(function(){

        var idthread = $(this).attr("value");

        var idsouscat = $(this).attr("val");

        $.post("forum/ajax_delete_thread",{idthread:idthread, idsouscat:idsouscat }, function(result){
             alert("ok");
            //$("#block-list-threads").html(result);
        });
    });

});
</script>


    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><?php echo t('f_addthread'); ?></button>
    <h2><?php echo t('f_topics').'<span class="label label-info">'.$souscategory[0]->name.'</span>'; ?></h2><br/>

<table class="table table-striped">
<div id="block-list-threads">

	<?php  foreach ($threads as $row): ?>
        <thead>
        <tr>
		<th >

            <?php


            echo '<img src="'.base_url().'/images/logo42.png" class="img-responsive" alt="Responsive image" id="image-user" />';
            echo '<span class="block-this-thread" value="'.$row->id.'">'.$row->subject.'</span>';
            echo"<br /> ".t("f_writtenby")."  ";;
            echo '<a href="'.site_url("users").'/account?uid='.$row->uid.'">'. $row->uid.'</a>  '.$row->date_created;
            echo '   <button type="button" class="btn btn-danger" id="delete_thread" value="'.$row->id.'" val="'.$row->id_souscategories.'">'.t("f_delete").'</button>'

            ?>
        </th>
            </tr>
        </thead>

	<?php endforeach; ?>

</div>
</table>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo t('f_addthread'); ?></h4>
                </div>
                <div class="modal-body">

                    <div id="block-threads-categories">
                        <div id="title-threads-category"><?php echo t('f_topics').'<span class="label label-info">'.$souscategory[0]->name.'</span>'; ?></div>

                        <div id="title-add-thread"><?php echo t('f_addthread'); ?></div>
                        <input type="hidden" name="category" id="input-category-thread" value="<?php echo $souscategory[0]->id; ?>">
                        <label for="subject" id="label-subject-thread" ><?php echo t('f_subject');?></label>
                        <input type="text" id="input-subject-thread" name="subject" />
                        <br/>
                        <textarea id="textarea-description-thread" name="description" placeholder="<?php echo t("f_writemessage"); ?>"></textarea>
                        <input type="submit" id="submit-add-thread" value="<?php echo t("f_add"); ?>" />

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo t("f_close"); ?></button>
                </div>
            </div>
            </div>
    </div>



