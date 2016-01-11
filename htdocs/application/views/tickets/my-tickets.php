<div class="container-fluid">
<div class="col-md-12">
    <h4 class="page-head-line"><?php echo t("t_title");?></h4>

</div>

	<div><a href='<?php echo site_url("tickets")?>/add_tickets' class="btn btn-primary btn-lg active" role="button" ><?php echo t("t_addticket");?></a></div>
	<table class="table table-condensed">
	<thead>
	<tr>
		<th ><?php echo t("t_name");?></th>
		<th >Admin</th>
		<th ><?php echo t("t_state");?></th>
		<th ><?php echo t("t_changestate");?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($tickets as $row): ?>
	<tr>
		<td ><a href='<?php echo site_url("tickets")?>/this_tickets?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo $row->subject; ?></a><?php echo " ".t("t_by")." ".$row->uid_users; ?></td>
		<?php if ($row->uid_admins == NULL): ?>
			<td ><?php echo t("t_assign");?></td>
		<?php else: ?>
			<td><?php echo $row->uid_admins; ?></td>
		<?php endif; ?>
		<?php if ($row->etat == 0): ?>
			<td ><?php echo t("t_ouvert");?></td>
			<td ><a href='<?php echo site_url("tickets")?>/close?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo t("t_fermé");?></a></td>
		<?php else: ?>
			<td ><?php echo t("t_fermé");?></td>
			<td ><a href='<?php echo site_url("tickets")?>/open?id=<?php echo $row->id; ?>' class='link-ticket'><?php echo t("t_ouvert");?></a></td>
		<?php endif; ?>
	</div>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>


</div>