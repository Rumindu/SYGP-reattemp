<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
<?php require APPROOT. '/views/inc/sidebar2.php'; ?>
  
<div class="body-container" style="height: 100vh;">    
  <h1>Add a question</h1>
    <div class="announcement-container">
      <form action="" method="post">
        <label for="scategory"><h2 style="margin:0px">Category</h3></label>
        <select name="scategory" id="scategory">
          <option value="">Select Category</option>
          <?php foreach($data['category'] as $category){
            echo "<option value='".$category->category."'>".$category->category."</option>";
          }
          ?>
        </select>
        <span class="form-invalid"><?php echo $data['scategory_err'];?>
        </span>
        <br>
        <br>
      <label for="title"><h2 style="margin:0px">Title</h3></label>
        <input id="title" type="text" name="title" placeholder="Enter the announcement title" value="<?php echo $data['title'];?>">
        <span class="form-invalid"><?php echo $data['title_err'];?>
        </span>
        <br>
        <label for="content"><h2 style="margin:0px">Content</h3></label>
        <textarea name="content" id="content" placeholder="Enter the announcement content" class="form-text-area" rows=10></textarea>
        <span class="form-invalid"><?php echo $data['content_err'];?>
        </span>
        <br><br>
        <input class="submit-btn" type="submit" value="Submit">
        <button type="button" class="delete-btn" onclick="window.location.href='<?php echo URLROOT?>/Announcements/index'">Cancel
        </button>
      </form>
    </div>
</div>