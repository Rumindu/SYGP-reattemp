<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
  
  <div class="form-container">
    <center><h1>User Sign up</h1></center>
    <form action="" method="POST">

      <div class="form-input-title">Name</div>
      <input type="text" name="name"  id="name" class="name" value="<?php echo $data['name']?>">
      <span class="form-invalid"><?php echo $data['name_err'];?></span>

      <div class="form-input-title">Email</div>
      <input type="email" name="email"  id="email" class="email" value="<?php echo $data['email']?>">
      <span class="form-invalid"><?php echo $data['email_err'];?></span>

      <div class="form-input-title">password</div>
      <input type="password" name="password"  id="password" class="password" value="<?php echo $data['password']?>">
      <span class="form-invalid"><?php echo $data['password_err'];?></span>

      <div class="form-input-title">Confirm password</div>
      <input type="password" name="confirm_password"  id="password" class="password" value="<?php echo $data['confirm_password']?>">
      <span class="form-invalid"><?php echo $data['confirm_password_err'];?></span>
      <br><br>
      <button type="submit" class="form-btn">Submit</button>

    </form>
  </div>

<?php require APPROOT. '/views/inc/footer.php'; ?>