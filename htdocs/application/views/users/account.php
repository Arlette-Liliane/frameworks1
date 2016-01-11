<script type="text/javascript">
	$(document).ready(function(){ 
        $("#submit-go-admin-account").click(function(){
        	var uid = $(this).attr("value");
    		$.post("ajax_switch_to_admin",{uid:uid}, function(result){
    			$("#result-switch-to-admin").html(result);
    		});
        });
    });
</script>

	<?php //print_r($user);

    //minitest pour connaitre les informations du ldap

   /*foreach($user as $use)
    {
       $use1 = $use;

        foreach($use1 as $us)
        {
            print_r($us) ;
            echo '<br>';
        }

    }*/
		if (isset($user[0]["birth-date"][0]))
		{
			$year = substr($user[0]["birth-date"][0], 0, 4);
			$month = substr($user[0]["birth-date"][0], 4, 2);
			$day = substr($user[0]["birth-date"][0], 6, 2);
			$birthdate = $day."/".$month."/".$year;
		}
	?>

    <div class="container-fluid">
        <div class="col-md-12">
            <h4 class="page-head-line"><?php echo t("title_account");?></h4>

        </div>


        <div class="row">
            <div class="col-sm-4" style="background-color:lavender;">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <?php  if (count($user) > 1): ?>

                        <?php if (isset($user[0]["jpegphoto"][0])): ?>
                                <img  src=<?php echo base_url(); ?>/images/profile.png class="img-thumbnail">
                            <div >
                                <?php if (isset($user[0]["uid"][0])): ?>
                                    <div >
                                        <span> <em><?php echo t("user_uid");?> : </em></span>
                                        <span  ><strong><?php echo $user[0]["uid"][0]; ?></strong></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($user[0]["sn"][0])): ?>
                                    <div >
                                        <span ><em><?php echo t("user_lastname");?> : </em></span>
                                        <strong> <span ><?php echo $user[0]["sn"][0]; ?></span></strong>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($user[0]["givenname"][0])): ?>
                                    <div >
                                        <span ><em><?php echo t("user_firstname");?> : </em></span>
                                        <span ><strong><?php echo $user[0]["givenname"][0]; ?></strong></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($user[0]["birth-date"][0])): ?>
                                    <div >
                                        <span ><em>birthdate : </em></span>
                                        <span ><strong><?php echo $birthdate; ?></strong></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($user[0]["mobile"][0])): ?>
                                    <div >
                                        <span><em><?php echo t("user_mobile");?> : </em></span>
                                       <span >  <strong><?php echo $user[0]["mobile"][0]; ?></strong></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($user[0]["alias"][0])): ?>
                                    <div >
                                        <span ><em>Mail : </em></span>
                                        <span ><strong><?php echo $user[0]["alias"][0]; ?></strong></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif;
                        echo "<br/>";



                             ?>

                        <?php if ($this->session->userdata("admin") == true): ?>
                            <div id="submit-go-admin-account"  value=<?php echo $user[0]["uid"][0]; ?>><?php echo t("switch_admin");?></div>
                            <div id="result-switch-to-admin"></div>
                        <?php endif; ?>
                        <div id="submit-my-tickets" ><a href='<?php echo site_url("tickets")?>/my_tickets' class='link-ticket'><?php echo t("tickets");?></a></div>

                        <?php if (!isset($_GET['uid'])): ?>


                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if ($this->session->userdata("admin") == true): ?>
            <div class="col-sm-4" style="background-color:lavender;">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="label label-danger"><?php echo count($logs);?></span> LOGS
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">

                                    </div>




                                    <?php if ($logs): ?>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">

                                            <tr>
                                                <td >UID</td>
                                                <td >Type</td>
                                                <td >Url page</td>
                                                <td >Action</td>
                                                <td >Date</td>

                                            </tr>

                                            <?php foreach ($logs as $row): ?>
                                                <tr>
                                                    <td ><?php echo $row->uid; ?></td>
                                                    <td ><?php echo $row->type; ?></td>
                                                    <td ><?php echo $row->urlpage; ?></td>
                                                    <td ><?php echo $row->comment; ?></td>
                                                    <td ><?php echo $row->date; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                        <?php endif; ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <?php endif; ?>
    </div>
        </div>
</div>