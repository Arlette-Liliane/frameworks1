<script type="text/javascript">
	$(document).ready(function(){
		$( "#submit-add-comment" ).click(function() {
            alert("comment");
  			var id_answer = $("#input-comment-answer").val();
  			var comment = $("#textarea-answer-thread").val();
  			$.post( "forum/ajax_add_comment_answer", {id_answer:id_answer, comment:comment}, function(result){
  				$("#block-all-comments").html(result);
  			});
		});
	});
</script>
<div id="block-answer-current">
	<div class="text-answer"><?php echo $answer[0]->answer; ?></div>
	<div class="text-uid"><?php echo $answer[0]->uid; ?></div>
</div>

<table class="table table-striped">
<div id="block-all-comments">
	<?php foreach($comments as $row): ?>
    <thead>
    <tr>
        <th >

        <div class="block-this-comment">
			<div class="text-comment"><?php echo $row->comment; ?></div>
			<div class="text-comment-uid"><?php echo t("f_posted")."  ".$row->uid; ?></div>
		</div>
        </th>
    </tr>
    </thead>
	<?php endforeach; ?>
</div>
</table>

<div id="block-form-comment">
	<div id="title-add-comment"><?php echo t("f_addcomment");?></div>
	<input type="hidden" name="answer" id="input-comment-answer" value="<?php echo $answer[0]->id; ?>">
    <textarea id="textarea-answer-thread" name="answer" placeholder="<?php echo t("f_writemessage");?>"></textarea>
    <div><input type="submit" id="submit-add-comment" value="<?php echo t("f_add");?>" /></div>
</div>