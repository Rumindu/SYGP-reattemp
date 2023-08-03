<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>
  
    <h1>Create an Announcement</h1>
    <div class="announcement-container">
      <form action="" method="post">
        <input type="text" name="title"
        placeholder="Title" value="<?php echo $data['title'];?>">
        <span class="form-invalid"><?php echo $data['title_err'];?></span>
        <input type="text" name="content" placeholder="Content" value="<?php echo $data['content'];?>">
        <span class="form-invalid"><?php echo $data['content_err'];?></span>
        <br><br>
        <input type="submit" value="Submit">
        
      </form>
    </div>
  
<?php require APPROOT. '/views/inc/footer.php'; ?>