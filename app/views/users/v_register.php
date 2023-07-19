<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar.php'; ?>
  <h1>User Sign up</h1>

  <div class="form-container">
    <form action="<?php echo URLROOT;?>/test" method="POST">
      
      <div class="form-input-title">Name</div>
      <input type="text" name="name"  id="name" class="name">
      <span class="form-invalid"></span>

      <div class="form-input-title">Name</div>
      <input type="text" name="name"  id="name" class="name">
      <span class="form-invalid"></span>

      <div class="form-input-title">Email</div>
      <input type="email" name="email"  id="email" class="email">
      <span class="form-invalid"></span>

      <div class="form-input-title">password</div>
      <input type="password" name="password"  id="password" class="password">
      <span class="form-invalid"></span>

      <div class="form-input-title">password</div>
      <input type="password" name="password"  id="password" class="password">
      <span class="form-invalid"></span>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>
  </div>

<?php require APPROOT. '/views/inc/footer.php'; ?>