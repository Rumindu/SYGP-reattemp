<?php require APPROOT. '/views/inc/header.php'; ?>
<?php require APPROOT. '/views/inc/topnavbar1.php'; ?>
  
  <main class="login-logout-main">
    <div class="form-container-login-logout" >
      <center style="font-size:2rem;font-weight:800; color:#198a35">User Sign up</center>
      <form action="" method="POST">

        <div class="form-input-title">Name</div>
        <input type="text" name="name"  id="name" class="name" value="<?php echo $data['name']?>">
        <span class="form-invalid"><?php echo $data['name_err'];?></span>

        <div class="form-input-title">NIC</div>
        <input type="text" name="nic"  id="nic" class="nic" value="<?php echo $data['nic']?>">
        <span class="form-invalid"><?php echo $data['nic_err'];?></span>

        <div class="form-input-title">Address</div>
        <input type="text" name="address"  id="address" class="address" value="<?php echo $data['address']?>">
        <span class="form-invalid"><?php echo $data['address_err'];?></span>
        <br><br>
        <div style="display:flex;flex-direction:row; justify-content:space-between">
          <div>
            <label for="district" class="form-input-title">District:</label>
            <select name="sdistrict" id="district">
              <option value="">Select District</option>
              <?php foreach($data['district'] as $district){
                echo "<option value='".$district->name."'>".$district->name."</option>";
              }
              ?>
            </select>
            <div class="form-invalid"><?php echo $data['district_err'];?></div>
          </div>
          <div>
              <label for="user_role" class="form-input-title">User Role:</label>
            <select name="user_role" id="user_role">
              <option value="">Select User Role</option>
              <option value="Producer">Producer</option>
              <option value="Agri Officer">Agri Officer</option>
            </select>
            <div class="form-invalid"><?php echo $data['user_role_err'];?></div>
          </div>
        </div>
        <br>
        <div class="form-input-title">Email</div>
        <input type="email" name="email"  id="email" class="email" value="<?php echo $data['email']?>">
        <span class="form-invalid"><?php echo $data['email_err'];?></span>
        
        <div class="form-input-title">Phone</div>
        <input type="text" name="phone"  id="phone" class="phone" value="<?php echo $data['phone']?>">
        <span class="form-invalid"><?php echo $data['phone_err'];?></span>

        
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
  </main>

<?php require APPROOT. '/views/inc/footer.php'; ?>