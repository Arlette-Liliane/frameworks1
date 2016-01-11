
<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="page-head-line"><?php echo t("t_title");?></h4>

    </div>

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
	<tr>
        <th ><?php echo t("t_name");?></th>
        <th >Admin</th>
        <th ><?php echo t("t_assigned");?></th>
        <th ><?php echo t("t_state");?></th>
        <th ><?php echo t("t_changestate");?></th>


	</tr>
	</thead>
	<tbody>
	<?php foreach($tickets as $row): ?>
	<tr>
	<?php if($row->uid_admins == NULL): ?>
		<td ><a href='<?php echo site_url("tickets")?>/this_tickets?id=<?php echo $row->id; ?>' class='link-ticket-message'><?php echo $row->subject; ?></a><?php echo " ".t("t_by")."  ".$row->uid_users; ?></td>
		<?php if ($row->uid_admins == NULL): ?>
			<td ><?php echo t("t_assigned");?></td>
		<?php else: ?>
			<td ><?php echo $row->uid_admins; ?></td>
		<?php endif; ?>
		<td class="danger"><a href='<?php echo site_url("admins")?>/assign_tickets?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo t("t_assigned");?></a>
		<?php if ($row->etat == 0): ?>
			<td class="danger"><?php echo t("t_ouvert");?></td>
			<td></td>
		<?php else: ?>
			<td class="warning"><?php echo t("t_fermé");?></td>
			<td ></td>
		<?php endif; ?>
	</div>
	<?php elseif($row->uid_admins == $this->session->userdata("uid")): ?>
	<div >
		<td ><a href='<?php echo site_url("tickets")?>/this_tickets?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo $row->subject; ?></a><?php echo " ".t("t_by")."  ".$row->uid_users; ?></td>
		<?php if ($row->uid_admins == NULL): ?>
			<td ><?php echo t("t_assign");?></td>
		<?php else: ?>
			<td ><?php echo $row->uid_admins; ?></td>
		<?php endif; ?>
		<td ><a href='<?php echo site_url("admins")?>/assign_tickets?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo t("t_assigned");?></a></td>
		<?php if ($row->etat == 0): ?>
			<td ><?php echo t("t_ouvert");?></td>
			<td ><a href='<?php echo site_url("admins")?>/close_tickets?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo t("t_fermé");?></a>
		<?php else: ?>
			<td ><?php echo t("t_fermé");?></td>
			<td><a href='<?php echo site_url("admins")?>/open_tickets?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo t("t_ouvert");?></a></td>
		<?php endif; ?>
	<?php endif; ?>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>






    <script type="text/javascript">

        $(document).ready(function(){
            $('#example').DataTable();
            $("#submit-add-thread").click(function(){



        });
    </script>