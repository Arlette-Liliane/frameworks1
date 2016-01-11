<div id="block-answer-ticket">
<div id="title-add-answer"><?php echo t("t_addticket"); ?></div>
<?php	echo form_open('tickets/add_tickets', array("id"=>"form-connexion")); ?>
	<label for="subject" id="label-subject-thread"><?php echo t("t_subject"); ?></label>
	<input type="text" id="input-subject-thread" name="subject" />
	<br/>
	<textarea id="textarea-answer-thread" name="description" placeholder="<?php echo t("t_writemessage"); ?>"></textarea>
	<input type="submit" id="submit-add-ticket" value="<?php echo t("t_add"); ?>" />
<?php echo form_close(); ?>
</div>
