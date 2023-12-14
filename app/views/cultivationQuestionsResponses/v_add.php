<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar.php'; ?>
  
<div class="body-container" style="height: 100vh;">    
  <h1>Publish a response</h1>
    <div class="announcement-container">
      <form action="" method="post">
        <label for="content"><h2 style="margin:0px">Content</h3></label>
        <textarea name="content" id="content" placeholder="Enter the response" class="form-text-area" rows=10></textarea>
        <span class="form-invalid"><?php echo $data['content_err'];?>
        </span>
        <br><br>
        <input class="submit-btn" type="submit" value="Submit">
        <button type="button" class="delete-btn" onclick="window.location.href='<?php echo URLROOT?>/CultivationQuestions/Index'">Cancel
        </button>
      </form>
    </div>
</div>
  
<?php require APPROOT. '/views/inc/footer.php'; ?>