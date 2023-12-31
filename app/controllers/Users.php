<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('M_Users');
    }

    public function register(){
      //geting districts list
      $district = $this->userModel->getDistricts();
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // entered data
        $data = [
          'name' => trim($_POST['name']),
          'nic' => trim($_POST['nic']),
          'address' => trim($_POST['address']),
          'sdistrict' => trim($_POST['sdistrict']),
          'phone' => trim($_POST['phone']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => $_POST['confirm_password'],
          'user_role' => trim($_POST['user_role']),

          'name_err' => '',
          'nic_err' => '',
          'address_err' => '',
          'district_err'=>'',
          'phone_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'user_role_err' => '',
          'district' => $district
        ];
        
        //print_r($data);
        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
        }

        if(empty($data['nic'])){
          $data['nic_err'] = 'Please enter NIC no.';
        }

        if(empty($data['address'])){
          $data['address_err'] = 'Please enter address';
        }

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }
        else{
          // Check email is already taken
          //if findUserByEmail in M_Users.php returns true, then email is already taken
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email is already taken';
          }
        }
        if(empty($data['phone'])){
        $data['phone_err'] = 'Please enter phone';
        }

        if(empty($data['sdistrict'])){
          $data['district_err'] = 'Please choose a district';
        }

        if(empty($data['user_role'])){
          $data['user_role_err'] = 'Please choose a User Role';
        }


        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }
        elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
        }
        else{
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        // Make sure errors are empty
        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
        // Validation completed

          // Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
            redirect('users/login');
          }
          else{
            die('Something went wrong');
          }
        }
        else{
          // Load view with errors
          $this->view('users/v_register', $data);
        }
      }
      else{
        // Initial data
        $data = [
          'name' => '',
          'nic' => '',
          'address' => '',
          'sdistrict' => '',
          'phone' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'user_role' => '',
          'name_err' => '',
          'nic_err' => '',
          'address_err' => '',
          'district_err'=>'',
          'phone_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'user_role_err' => '',
          'district' => $district
        ];
        //print_r($data);

        // Load view
        $this->view('users/v_register', $data);
      }
    }

      public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form
          // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          // entered data
          $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'email_err' => '',
            'password_err' => '',
          ];

          // Validate Email
          if(empty($data['email'])){
            $data['email_err'] = 'Please enter email';
          }

          // Validate Password
          if(empty($data['password'])){
            $data['password_err'] = 'Please enter password';
          }

          // Check for user/email
          if($this->userModel->findUserByEmail($data['email'])){
            // User found
          }
          else{
            // User not found
            $data['email_err'] = 'No user found';
          }

          // Make sure errors are empty
          if(empty($data['email_err']) && empty($data['password_err'])){
            // Validated
            // Check and set logged in user
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);

            if($loggedInUser){

              // Create Session
              $this->createUserSession($loggedInUser);
            }
            else{
              $data['password_err'] = 'Password incorrect';

              $this->view('users/v_login', $data);
            }
          }
          else{
            // Load view with errors
            $this->view('users/v_login', $data);
          }
        }
        else{
          // Initial data
          $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => '',
          ];

          // Load view
          $this->view('users/v_login', $data);
        }
      }
      

      //After login success, create user session
      public function createUserSession($user){
        // $loggedInUser is equal to the $user.. $loggedInUser contains associative array of M_users.php's login functions return value
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_role'] = $user->role;
        //print_r ($user);
      
        redirect('announcements/index');
      }

      public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        redirect('users/login');
      }
  }