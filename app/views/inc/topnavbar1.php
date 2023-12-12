<div class="topnav">

  <img src="<?php echo URLROOT."/public/img/navbar-logo-large.webp";?>" alt="logo" height="72px">

  <?php if(isset($_SESSION['user_id'])) : ?>
    <div class=nav-element>
      <a href="#"><?php echo $_SESSION['user_role']; ?> <br> <?php echo $_SESSION['user_name']; ?></a>
      <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
    </div>
  <?php else : ?>
    <div class=nav-element>
      <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
    </div>
  <?php endif; ?>    

  
</div>