<?php foreach($comments as $row): ?>
	<div class="block-this-comment">
		<div class="text-comment"><?php echo $row->comment; ?></div>
		<div class="text-comment-uid"><?php  echo t("f_posted")."  ".$row->uid; ?></div>
	</div>
<?php endforeach; ?>