<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>

<div class="body-container style="height: 100vh;">
  <div class="warning-container">
    <center><h3 style="
    font-size: 1.5em;">Are you sure you want to permanently delete this announcement?</h3></center>
    <br>
    <div style="display: flex; justify-content: center; gap:20px;">
      <form action="" method="post">
        <input type="submit" value="Ok" class="delete-btn">
      </form>
      <a href="<?php echo URLROOT ?>/announcements/index"><button class="submit-btn">Cancel</button></a>
    </div>
  </div>
</div>




