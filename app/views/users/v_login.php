<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
  <h1>User Login</h1>

  <div class="form-container">
    <form action="<?php echo URLROOT;?>/test" method="POST">
      
      <div class="form-input-title">Email</div>
      <input type="email" name="email"  id="email" class="email">
      <span class="form-invalid"></span>

      <div class="form-input-title">password</div>
      <input type="password" name="password"  id="password" class="password">
      <span class="form-invalid"></span>

      <br><br>
      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>

<?php require APPROOT. '/views/inc/footer.php'; ?>