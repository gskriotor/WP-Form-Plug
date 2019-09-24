<?php

function wfp_html($name, $email, $pass, $school, $teacher) {
    
    echo '
      <form class="regForm" action="'.$_SERVER['REQUEST_URI'].'" method="POST">
      
        <div class="tab">
          <p>
            <label>Name</label><br>
            <input type="text" name="name" value"'.(isset($_POST['name']) ? $name : null).'" oninput="this.className = \'\'" />
          </p>
        </div>
        
        <div class="tab">
          <p>
            <label>Email</label><br>
            <input type="text" name="email" value"'.(isset($_POST['email']) ? $email : null).'" oninput="this.className = \'\'" />
          </p>
        </div>
        <div class="tab">
          <p>
            <label>Password</label><br>
            <input type="text" name="password" value"'.(isset($_POST['password']) ? $pass : null).'" oninput="this.className = \'\'" />
          </p>
        </div>
        <div class="tab">
          <p>
            <label>School</label><br>
            <input type="text" name="school" value"'.(isset($_POST['school']) ? $school : null).'" oninput="this.className = \'\'" />
          </p>
        </div>
        <div class="tab">
          <p>
            <label>Teacher</label><br>
            <input type="text" name="teacher" value"'.(isset($_POST['teacher']) ? $teacher : null).'" oninput="this.className = \'\'" />
          </p>
        </div>
        
        <div style="overflow: auto;">
          <div style="float: right;">
          
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">
              Previous
            </button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">
              Next
            </button>
            
          </div>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        </div>
        
      </form>
    ';
}

global $reg_errors;
$reg_errors = new WP_Error;

function complete_registration() {
    global $reg_errors, $username, $password, $email, $name, $school, $teacher;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password
        );
        $user = wp_insert_user( $userdata );
        echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';   
    }
}

function custom_registration_function() {
    
    if ( isset($_POST['submit'] ) ) {
         
        // sanitize user form input
        global $username, $password, $email;
        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );

        // call @function complete_registration to create the user
        // only when no WP_error is found
        complete_registration(
        $username,
        $password,
        $email,
        $school
        );
    
    }
    registration_form(
        $username,
        $password,
        $email,
        $school
        );
}

?>
