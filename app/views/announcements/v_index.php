<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>


<?php foreach($data['announcements'] as $announcement) : ?>
  <div class="announcement-container" style="margin-left:280px">
    <h3><?php echo $announcement->title;?></h3>
    <p><?php echo $announcement->content;?></p>
    <p><?php echo $announcement->name;?></p>
    <p><?php echo $announcement->published_date_time;?></p>
    <?php
    if($_SESSION['user_id'] == $announcement->agri_officer_id){?>
      <div>
        <a href="<?php echo URLROOT ."/announcements/edit/".$announcement->announcement_id?>"><button class="edit-btn">
          Edit
        </button></a>
      </div>
      <div>
        <form  action="<?php echo URLROOT ."/announcements/delete/".$announcement->announcement_id?>" method="post">
          <input class="delete-btn" type="submit" value="Delete" >
        </form>
      </div>
    <?php }
    ?>
    <br><br>
  </div>
<?php endforeach; ?>
  
<?php require APPROOT. '/views/inc/footer.php'; ?>