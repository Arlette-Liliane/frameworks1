<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="page-head-line"><?php echo t("t_assigned")." ".t("t_title");?></h4>

    </div>
</div>
<div id="block-list-tickets">

    <div class="row">
        <div class="col-lg-12">
            <?php echo form_open('admins/assign_tickets',array("id"=>"form-assign-tickets")); ?>
            <input type="hidden" id="input-id-tickets" name="id" value="<?php echo $id; ?>" />
            <select name="uid_admins">
              <?php foreach ($admins as $row): ?>
                <option value="<?php echo $row->uid; ?>" ><?php echo $row->uid; ?></option>
              <?php endforeach; ?>
            </select>
            <input type="submit" id="submit-add-tickets" value="<?php echo t("t_assigned");?>" />
            <?php echo form_close(); ?>
    </div>
        </div>
</div>