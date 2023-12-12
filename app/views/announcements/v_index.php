<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php if($_SESSION['user_role'] == 'Agri Officer'){
  require APPROOT. '/views/inc/sidebar.php'; 
  }
  else{
    require APPROOT. '/views/inc/sidebar2.php';
  }?>


<div class="body-container">
  <div style="display:flex; justify-content:space-between; align-items: center;" >
    <h1 style="font-size: 2.8em;">Announcements</h1>
    <?php if($_SESSION['user_role'] == 'Agri Officer'){?>
    <a href="<?php echo URLROOT;?>/announcements/add"><button class="publish-announcement-btn"><h2>Publish announcement</h2></button></a>
    <?php }?>
  </div>
  
  
  <?php foreach($data['announcements'] as $announcement) : //here ':' for indicate starting of the foreach loop body ?>
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
          <h3><?php echo $announcement->name;?> - </h3>
          <h3><?php echo $announcement->published_date_time;?></h3>
        </div>
    </div>
    <br><br>
  <?php endforeach;//end of foreach loop. We can use '{}' instead of ':' and 'endforeach' ?>
</div>
<?php require APPROOT. '/views/inc/footer.php'; ?>