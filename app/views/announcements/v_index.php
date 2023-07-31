<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
  
<h1>Welcome <?php echo $_SESSION['user_name'];
echo $_SESSION['user_id'];?></h1>

<?php foreach($data['announcements'] as $announcement) : ?>
  <div class="announcement-container">
    <h3><?php echo $announcement->title;?></h3>
    <p><?php echo $announcement->content;?></p>
    <p><?php echo $announcement->name;?></p>
    <p><?php echo $announcement->published_date_time;?></p>
    <?php
    if($_SESSION['user_id'] == $announcement->agri_officer_id){?>
      <div></div>
        <a href="<?php echo URLROOT ."/announcements/edit/".$announcement->announcement_id?>"><button>
          Edit
        </button></a>
      </div>
      <div>
        <form class="pull-right" action="<?php echo URLROOT ."/announcements/delete/".$announcement->announcement_id?>" method="post">
        <input type="submit" value="Delete" ">
        </form>
      </div>
    <?php }
    ?>
    <br><br>
  </div>
<?php endforeach; ?>
  
<?php require APPROOT. '/views/inc/footer.php'; ?>