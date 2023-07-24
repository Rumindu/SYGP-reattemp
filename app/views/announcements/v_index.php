<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
  
<h1>Welcome <?php echo $_SESSION['user_name'];
echo $_SESSION['user_id'];?></h1>

<?php foreach($data['announcements'] as $announcement) : ?>
  <div class="announcement-container">
    <h3><?php echo $announcement->title;?></h3>
    <p><?php echo $announcement->content;?></p>
    <p><?php echo $announcement->agri_officer_id;?></p>
    <p><?php echo $announcement->published_date_time;?></p>
    <br><br>
  </div>
<?php endforeach; ?>
  
<?php require APPROOT. '/views/inc/footer.php'; ?>