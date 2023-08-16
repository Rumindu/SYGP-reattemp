<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>
  
  <div class="body-container" style="height: 100vh;"> 
    <div class="announcement-container">
      <h1 style="text-align:center">Edit an Announcement</h1>
      <form action="" method="post">
        <label for="content"><h2 style="margin:0px">Content</h3></label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-text-area">
          <?php echo $data['content'];?> 
        </textarea>
        <span class="form-invalid"><?php echo $data['content_err'];?></span>
        <br><br>
        <div style="display: flex; justify-content: center; gap: 20px;">
          <input class="submit-btn" type="submit" value="Submit">
          <?php require APPROOT. '/views/inc/footer.php'; ?>
          <!-- <a href="<?//php echo URLROOT?>/announcements/index"><button>Cancel</button></a> //this one is redirecting to the Index page. But db query is executing -->
          <button type="button" class="delete-btn" onclick="window.location.href='<?php echo URLROOT."/CultivationQuestions/detail/".$data['question_id'];?>'" ">Cancel</button>
        </div>
      </form>
    </div>
  </div>
  
