<!--<div id="block-board-menu">
	<a href='<?php //echo site_url("admins")?>/board_admins' class="link-board-menu">Admins</a>
	<a href='<?php //echo site_url("admins")?>/board_tickets' class="link-board-menu">Tickets</a>
	<a href='<?php //echo site_url("admins")?>/board_categories' class="link-board-menu">Categories</a>
	<a href='<?php //echo site_url("admins")?>/board_souscategories' class="link-board-menu">Sous Categories</a>
	<a href='<?php //echo site_url("admins")?>/board_semestres' class="link-board-menu">Semestres</a>
	<a href='<?php //echo site_url("admins")?>/board_modules' class="link-board-menu">Modules</a>
	<a href='<?php //echo site_url("admins")?>/board_activities' class="link-board-menu">Activités</a>
</div>-->

<!-- LOGO HEADER END-->

<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a <?php echo (uri_string() === "/admins/board_admins")?'class="menu-top-active"' : NULL; ?> href='<?php echo site_url("admins")?>/board_admins' class="link-board-menu">Admins</a></li>
                        <li><a <?php echo (uri_string() === "/admins/board_tickets")?'class="menu-top-active"' : NULL; ?> href='<?php echo site_url("admins")?>/board_tickets' class="link-board-menu">Tickets </a></li>
                        <li><a  <?php echo (uri_string() === "/admins/board_categories")?'class="menu-top-active"' : NULL; ?> href='<?php echo site_url("admins")?>/board_categories' class="link-board-menu">Categories</a></li>
                        <li><a <?php echo (uri_string() === "/admins/board_souscategories")?'class="menu-top-active"' : NULL; ?> href='<?php echo site_url("admins")?>/board_souscategories' class="link-board-menu">Sous Categories</a></li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>