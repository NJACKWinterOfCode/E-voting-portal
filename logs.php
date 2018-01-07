<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php
if (logged_in()) {
    redirect_to("voting.php");
}
?>
<!--The MIT License (MIT)

Copyright (c) <2015> <ANUPAM DAS>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE
-->
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 2% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 0px;
  padding: 20px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

.submit {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.submit:hover,.submit:active,.submit:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}



@charset "utf-8";
@import url(http://weloveiconfonts.com/api/?family=fontawesome);

[class*="fontawesome-"]:before {
  font-family: 'FontAwesome', sans-serif;
}


.input {
  border: none;
  font-family: 'Open Sans', Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5em;
  padding: 0;
  -webkit-appearance: none;
}

after { clear: both; }

#login {
  margin: 20px auto;
  width: 320px;
}

#login form {
    margin-left: -20px;
  padding: 22px 22px 22px 22px;
  width: 100%;
  border-radius: 5px;
  background: #282e33;
  border-top: 3px solid #434a52;
  border-bottom: 3px solid #434a52;
}

#login form span {
  background-color: #363b41;
  border-radius: 3px 0px 0px 3px;
  border-right: 3px solid #434a52;
  color: #606468;
  display: block;
  float: left;
  line-height: 50px;
  text-align: center;
  width: 50px;
  height: 50px;
}

#login form input[type="text"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 82%;
  height: 50px;
}

#login form input[type="password"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 82%;
  height: 50px;
}

#login form input[type="submit"] {
  background: #16aa56;
  border: 0;
  width: 100%;
  height: 40px;
  border-radius: 3px;
  border-style: inset;
  color: white;
  cursor: pointer;
  transition: background 0.3s ease-in-out;
}
#login form input[type="submit"]:hover {
  background: #16aa56;
}
.register_button {
  background: #16aa56;
  border: 0;
  width: 62%;
  height: 40px;
  border-radius: 3px;
  cursor: pointer;
  padding:15px 0px 0px 120px;
  transition: background 0.3s ease-in-out;
}
</style>
<script src="https://use.fontawesome.com/611b5cfd70.js"></script>
<?php include ('includes/header.php'); ?>

    <?php
    if (($_SERVER['REQUEST_METHOD'] == 'POST')):
        if (isset($_POST['roll']) && isset($_POST['password'])) {
            $roll = mysql_prep($_POST['roll']);
            $pass = sha1(mysql_prep($_POST['password']));
            if (!empty($roll) && !empty($pass)) {
                $query = "SELECT roll,password,degree,gender,year FROM user WHERE roll='$roll' LIMIT 1";
                if ($query_run = mysqli_query($link, $query)) {
                    if ((mysqli_num_rows($query_run) == 1)) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            $pass_db = $row['password'];
                            if ($pass == $pass_db) {
                                $_SESSION['roll'] = $row['roll'];
                                $_SESSION['degree'] = $row['degree'];
                                $_SESSION['gender'] = $row['gender'];
                                $_SESSION['year'] = $row['year'];

                                redirect_to("voting.php");
                            } else
                                echo '<strong>Enter Correct Username and Password</strong>';
                        }
                    } else
                        echo '<strong>Enter Correct Username and Password</strong>';
                }
            } else
                echo '<strong>Please Fill Up all the details</strong>';
        }

    endif;
    ?>

	
	
	<div class="login-page">
	<div class="form">
	<h2>Please Sign In</h2>
	  </div>

  <div id="login">
      <form name='form-login' action="logs.php" method="POST" >
        <span class="fontawesome-user"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true" style="margin-top:10px;"></i></span>
          <input type="text" class="input" tabindex="1" maxlength="10" autofocus placeholder="Roll No. *" required name="roll" value="<?php
        if (isset($roll) && !empty($roll)) {
            echo $roll;
        }
        ?>">
       
        <span class="fontawesome-lock"><i class="fa fa-key fa-2x" aria-hidden="true" style="margin-top:10px;"></i></span>
           <input type="password" class="input" placeholder="Password  * " maxlength="40"required tabindex="2" name="password">
        <input type="submit" tabindex="3" value="LOGIN"><br>
		    <p style="text-decoration:none; color:silver;">Not Yet Registered?<br></p><p class="register_button" ><a href="signs.php" style="text-decoration:none;color: white;">Register Here</a></p>
</form>
      </div>

</div>

<?php include ('includes/footer.php'); ?>