<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Intra - Born To Code</title>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

	<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>js/jquery.metadata.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.tablesorter.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Marck+Script' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>




	<link href="<?php echo base_url(); ?>css/style.css" rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>css/style1.css" rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>css/font-awesome.css" rel='stylesheet' type='text/css'>
</head>
<body>
<header>

        <div class="row">
            <div class="col-md-12">
                <?php
               // var_dump($this->session->userdata("admin"));
                    //var_dump($_SERVER['REQUEST_URI']);
                //var_dump($_GET);
                if ($this->config->item('language') === "english")
                {
                    $lang = "en";
                }
                else
                    $lang = "fr";
                ?>

                <ul id="menu-top" class="nav navbar-nav navbar-right">
                    <li> <a href='<?php echo site_url("forum")?>' class="link-menu">Forum</a></li>

                    <li><a href="<?php  echo lang_url("fr"); ?>">
                            <img src="<?php echo base_url(); ?>images/france.png" class="img-responsive" alt="Responsive image" id="image-user">
                        </a>
                    </li>
                    <li><a href="<?php echo lang_url("en"); ?>">
                            <img src="<?php echo base_url(); ?>images/angleterre.jpg" class="img-responsive" alt="Responsive image" id="image-user">
                        </a>
                    </li>
                </ul>
            </div>

        </div>

</header>
<!-- HEADER END-->
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="index.html">

                <img  src="<?php  echo base_url(); ?>/images/logo42.png"/>
            </a>

        </div>

        <div class="left-div">
            <div class="user-settings-wrapper">
                <ul class="nav">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                        </a>

                        <div class="dropdown-menu dropdown-settings">

                            <div class="media">

                                <div class="media">
                                    <a class="media-left" href='<?php

                                    echo site_url("users")?>/account'><img  src=<?php echo base_url(); ?>/images/profile.png>
                                <div class="media-body">



                                <?php if (!($this->session->userdata("uid"))) {

                                   echo '<h4 class="media-heading"><span id="uid-user">Anonymous</span></h4>';
                                echo '<h5><a href='.site_url("users").'/signin id="link-connexion">'.t("h_login").'</a></h5>';
                                }
                                if ($this->session->userdata("uid") && !$this->session->userdata("admin"))
                                echo '<h4>'.$this->session->userdata("uid").'</h4>';
                                else if ($this->session->userdata("admin") == true) {
                                    echo '<h4>'.$this->session->userdata("uid").'</h4>';
                                    echo '<h4 class="media-heading"> <a href=' . site_url("admins") . '/board_admins class="link-menu">Admin</a></h4>';


                                }

                                ?>

                                </div>

                        </div>
                                <?php

                                    echo '<a href = '.site_url("users").'/account class="btn btn-info btn-sm" > '.t("h_profile").'</a >&nbsp;';
                                        echo '<a href = '.site_url("users").'/logout class="btn btn-danger btn-sm" > '.t("h_logout").'</a >';

                                ?>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<div class="content-wrapper">







