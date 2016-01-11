<div id="block-connexion">
  <div id='title-connexion'><?php echo t("user_login") ?></div>
  <?php	echo form_open('users/signin', array("id"=>"form-connexion")); ?>
    <?php echo form_error('uid', '<span class="error-form">','</span>'); ?>
    <br/>
    <label for="uid" id="label-uid-connexion"><?php echo t("user_login_use") ?> *</label>
    <input type="text" id="input-uid-connexion" name="uid" value="<?php echo set_value('uid'); ?>" />
    <br/>

    <?php echo form_error('password', '<span class="error-form">','</span>'); ?>
    <br/>
    <label for="password" id="label-password-connexion"><?php echo t("user_pass") ?> *</label>
    <input type="password" id="input-password-connexion" name="password" value="<?php echo set_value('password'); ?>" />
    <br/>
    <input type="submit" id="submit-connexion" value="<?php echo t("user_connect") ?>" />
  	<?php echo form_close(); ?>
</div>