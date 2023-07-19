<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
  <h1>User Login</h1>

  <div class="form-container">
    <form action="" method="POST">
      
      <div class="form-input-title">Email</div>
      <input type="email" name="email"  id="email" class="email" value="<?php echo $data['email'];?>">
      <span class="form-invalid"><?php echo $data['email_err'];?></span>

      <div class="form-input-title">password</div>
      <input type="password" name="password"  id="password" class="password" value="<?php echo $data['password'];?>">
      <span class="form-invalid"><?php echo $data['password_err'];?></span>

      <br><br>
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>

<?php require APPROOT. '/views/inc/footer.php'; ?>