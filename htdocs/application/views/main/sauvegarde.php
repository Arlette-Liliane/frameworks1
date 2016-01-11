<div id="block-header">
    <img id="image-42" src="<?php echo base_url(); ?>/images/logo42.png"/>
    <div id='block-menu'>
        <a href='<?php echo site_url("forum")?>' class="link-menu">Forum</a>
        <a href='<?php echo site_url("users")?>/yearbook?letter=A' class="link-menu">Yearbook</a>
    </div>
    <div id="block-connexion-header">
        <?php if (!($this->session->userdata("uid"))): ?>
        <span id="uid-user">Anonymous</span>
        <a href='<?php echo site_url("users")?>/signin' id='link-connexion'>Login</a>
    </div>
    <?php else: ?>
        <?php if ($this->session->userdata("admin") == true): ?>
            <a href='<?php echo site_url("admins")?>/board_admins' class="link-menu">Admin</a>
            <a href='<?php echo site_url("users")?>/signin' class="link-menu">Login As</a>
        <?php endif; ?>
        <a href='<?php echo site_url("users")?>/account'><img id="image-user" src="https://cdn.42.fr/userprofil/profilview/<?php echo $this->session->userdata("uid"); ?>.jpg"/></a>
        <a href='<?php echo site_url("users")?>/account' id="uid-user"><?php echo $this->session->userdata("uid"); ?></a>
        <a href='<?php echo site_url("users")?>/logout' id='link-connexion'>Logout</a>
    <?php endif; ?>
</div>
</div>