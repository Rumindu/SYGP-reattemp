<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>

<div class="body-container">
  <div style="display:flex; justify-content:space-between; align-items: center;" >
    <h1 style="font-size: 2.8em;">Announcements</h1>
    <a href="<?php echo URLROOT;?>/announcements/add"><button class="publish-announcement-btn"><h2>Publish announcement</h2></button></a>
  </div>
  
  <?php foreach($data['announcements'] as $announcement) : ?>
  <div class="announcement-container">
    <h2><?php echo $announcement->title;?></h2>
    <p><?php echo $announcement->content;?></p>
        <?php
        if($_SESSION['user_id'] == $announcement->agri_officer_id){?>
          <div style="Display:flex; gap:5px">
            <a href="<?php echo URLROOT ."/announcements/edit/".$announcement->announcement_id?>">
              <button class="edit-btn">
                Edit
              </button>
            </a>
            <a href="<?php echo URLROOT ."/announcements/delete/".$announcement->announcement_id?>">
              <button class="delete-btn">
                Delete
            </button></a>
          </div>
        <?php }?>
        <div style="display:flex; justify-content: flex-end;">
          <p><?php echo $announcement->name;?> - </p>
          <p><?php echo $announcement->published_date_time;?></p>
        </div>
    </div>
    <br><br>
  <?php endforeach; ?>
</div>
<?php require APPROOT. '/views/inc/footer.php'; ?>