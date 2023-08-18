<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>


<main class="login-logout-main">
  <div class="form-container-login-logout" >
    <center style="font-size:2rem; color:#198a35">User Login</center>
    
    <form action="" method="POST">
      <div class="form-input-title" style="font-size: medium;">Email</div>
      <input type="email" name="email"  id="email" class="email" value="<?php echo $data['email'];?>">
      <span class="form-invalid"><?php echo $data['email_err'];?></span>
      <br>
      <label for="password" style="font-size: medium;">Password</label>
      <input type="password" name="password"  id="password" class="password" value="<?php echo $data['password'];?>">
      <span class="form-invalid"><?php echo $data['password_err'];?></span>

      <br><br>
      <button type="submit" class="form-btn">Submit</button>

    </form>
  </div>
</main>

<?php require APPROOT. '/views/inc/footer.php'; ?>