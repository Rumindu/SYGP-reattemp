<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('M_Users');
    }

    public function register(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // entered data
        $data = [
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),

          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];
        
        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Please enter name';
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
            // Set flash message
            flash('reg_flash', 'You are registered and can log in');
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
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

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
        // $loggedInUser is equal to the $user. $loggedInUser contains associative array of M_users.php's login functions return value
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        print_r ($user);
        redirect('pages/index');
      }

      public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
      }

      public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
          return true;
        }
        else{
          return false;
        }
      }

        
    
  }