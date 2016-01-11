<script>

    $(document).ready(function(){
        $("#submit-add-thread").click(function(){
            var idcategory = $("#input-category-thread").attr("value");
            var subject = $("#input-subject-thread").val();
            var description = $("#textarea-description-thread").val();
            if (!description)
                alert("error");
            else
            {
                $.post("forum/ajax_add_thread",{idcategory:idcategory, subject:subject, description:description}, function(result){
                    $("#block-list-threads").html(result);
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
                    alert("delete");
                //$("#block-list-threads").html(result);
            });
        });
    });


</script>

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><?php echo t('f_addthread'); ?></button>
<h2><?php echo  t('f_topics').'<span class="label label-info"> '.$category[0]->name.'</span>'?></h2><br/>


<table class="table table-striped">
    <div id="block-list-threads">

        <?php  foreach ($threads as $row): ?>
            <thead>
            <tr>
                <th >

                    <?php
                    echo '<div><img src="'.base_url().'/images/logo42.png" class="img-responsive" alt="Responsive image" id="image-user" /></div>';
                    echo '<div><span class="block-this-thread" value="'.$row->id.'">'.$row->subject.'</span>';
                    echo"<br /> ".t("f_writtenby")."  ";
                    echo '<a href="'.site_url("users").'/account?uid=  '.$row->uid.'">'. $row->uid.'</a>  '.$row->date_created;

                        echo '   <button type="button" class="btn btn-danger" id="delete_thread" value="'.$row->id.'" val="'.$row->id_categories.'">'.t("f_delete").'</button></div>'
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
                    <div id="title-threads-category"><?php echo t('f_topics').'<span class="label label-info">'.$category[0]->name.'</span>'; ?></div>

                    <input type="hidden" name="category" id="input-category-thread" value="<?php echo $category[0]->id; ?>">
                    <label for="subject" id="label-subject-thread"><?php echo t('f_subject');?></label>
                    <input type="text" id="input-subject-thread" name="subject" />
                    <br/>
                    <textarea id="textarea-description-thread" name="description" placeholder="<?php echo t("f_writemessage"); ?>"></textarea>
                    <input type="submit" id="submit-add-thread" value="<?php echo t("f_add"); ?>" />


                </div>
            </div>
            <br />
            <br />
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo t("f_close"); ?></button>
            </div>
        </div>
    </div>
</div>

