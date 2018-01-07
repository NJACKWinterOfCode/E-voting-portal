<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
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

.register-page {
  width: 700px;
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
  width: 360px;
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
  width: 100%;
  height: 50px;
}

#login form input[type="password"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 100%;
  height: 50px;
}


#login form input[type="email"] {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 100%;
  height: 50px;
}

#login form select {
  background-color: #3b4148;
  border-radius: 0px 3px 3px 0px;
  color: #a9a9a9;
  margin-bottom: 1em;
  padding: 0 16px;
  width: 100%;
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
<?php include ('includes/header.php'); ?>
    <?php
    $email_id = NULL;
    $pass = NULL;
    $pass2 = NULL;
    $firstname = NULL;
    $lastname = NULL;
    $degree = NULL;
    $ph = NULL;
    $roll = NULL;
    $gender = NULL;
    if (($_SERVER['REQUEST_METHOD'] == 'POST')):
        if (isset($_POST['email_id']) || isset($_POST['pass']) || isset($_POST['pass2']) || isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['degree']) || isset($_POST['roll']) || isset($_POST['gender']) || isset($_POST['ph'])) {
            if (isset($_POST['email_id']) && isset($_POST['pass']) && isset($_POST['pass2']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['degree']) && isset($_POST['roll']) && isset($_POST['gender'])) {
                $email_id = mb_strtolower(mysql_prep($_POST['email_id']));
                $pass = mysql_prep($_POST['pass']);
                $pass2 = mysql_prep($_POST['pass2']);
                $firstname = ucfirst(mysql_prep($_POST['firstname']));
                $lastname = ucfirst(mysql_prep($_POST['lastname']));
                $degree = mysql_prep($_POST['degree']);
                $ph = mysql_prep($_POST['ph']);
                $roll = strtoupper(mysql_prep($_POST['roll']));
                $gender = mysql_prep($_POST['gender']);
                $year = (int) (date("y")) - (int) (substr($roll, 0, 2));
                if (!empty($pass) && !empty($pass2) && !empty($firstname) && !empty($lastname) && !empty($degree) && !empty($roll) && !empty($gender) && !empty($email_id) && !empty($year)) {
                    if ($pass == $pass2) {
                        $query = "SELECT roll,email_id FROM user WHERE roll='{$roll}' OR email_id='{$email_id}' ";
                        $query_run = mysqli_query($link, $query);
                        if (mysqli_num_rows($query_run) == 0) {
                            $enc_pass = sha1($pass);
                            $random_num = mt_rand(10000, 99999);
                            $email_name = strstr($email_id, '@', true); //vs.5.3.0
                            $res = sent_mail($random_num, $email_name);

                            $query = "INSERT INTO user 
                            (firstname,lastname,roll,degree,year,email_id,gender,ph,password,keyid,sent)
                            VALUES ('{$firstname}','{$lastname}','{$roll}','{$degree}','{$year}','{$email_id}','{$gender}','{$ph}','{$enc_pass}','{$random_num}','{$res}')";

                            if (mysqli_query($link, $query)) {
                                echo '<strong>Successfully Registerd To Gymkhanna Election Protocol....</strong>';
                                $email_id = NULL;
                                $pass = NULL;
                                $pass2 = NULL;
                                $firstname = NULL;
                                $lastname = NULL;
                                $degree = NULL;
                                $ph = NULL;
                                $roll = NULL;
                                $year = NULL;
                                $gender = NULL;
                            } else
                                echo '<strong>Try after some Time</strong>';
                        } else
                            echo '<strong>Roll Number or Email Id Already Exists.</strong>';
                    } else
                        echo '<strong>Password doesn\'t Match</strong>';
                }
            }
            else {
                echo '<strong>Please fill up all the boxes!</strong>';
            }
        }
    endif;
    ?>
	<div class="register-page">
	<div class="form">
	<h2>Register</h2>
	  </div>
 <div id="login">
	<span id="alertbox"></span>
    <form action="signs.php" method="POST" class="login-form">
        <br><input type="text" class="input" placeholder="First Name *" autofocus required tabindex="1"  maxlength="30"value="<?php echo htmlentities($firstname); ?>" name="firstname">
        <br><input type="text" class="input" placeholder="Last Name *" required tabindex="2" maxlength="30" value="<?php echo htmlentities($lastname); ?>"name="lastname">
        <br><select name="degree"  class="input" maxlength="2" required tabindex="3">
            <option value="BT"<?php
            if ((isset($degree)) && ($degree === 'BT')) {
                echo "selected";
            }
            ?>>B.Tech</option>
            <option value="MT"<?php
            if ((isset($degree)) && ($degree === 'MT')) {
                echo "selected";
            }
            ?>>M.Tech</option>
            <option value="PD"<?php
            if ((isset($degree)) && ($degree === 'PD')) {
                echo "selected";
            }
            ?>>Ph.D</option>
        </select>
        <br><input type="text" name="roll"  class="input" tabindex="4"  required placeholder="Roll No. *" maxlength="10" value="<?php echo htmlentities($roll); ?>">                    
        <br><input type="email" class="input" placeholder="Enter IITP Email id." required tabindex="5" onchange="isGmailOrYahoo(this.value);" maxlength="50" name="email_id"  value="<?php echo htmlentities($email_id); ?>">
        <br><br>
		<div style="color:white;text-align:center;">
		
		<input type="radio" id="male" checked="checked" placeholder="Male" required <?php
        if ((isset($gender)) && ($gender === 'M')) {
            echo "checked";
        }
        ?> name="gender"maxlength="1" value="M">  Male
		<input type="radio" id="female" name="gender"<?php
        if ((isset($gender)) && ($gender === 'F')) {
            echo "checked";
        }
        ?> maxlength="1"value="F"> Female
		</div>
        <br><input type="password" class="input" tabindex="8" required  placeholder="Enter Password *"name="pass">
        <br><input type="password" class="input" tabindex="9"required  placeholder="Re-Enter Password *"name="pass2">
        <br><input type="text" class="input" tabindex="10" name="ph"placeholder="Mobile Number" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo htmlentities($ph); ?>">
        <br><input type="submit" class="submit" tabindex="11" value="Register" >
    </form>
</div>

  </div>
  
  <script>
  function isGmailOrYahoo(mailaddr) {
    var re = /.+@(iitp.ac.in)/;
	if(re.test(mailaddr)!=true){
		var getspan=document.getElementById("alertbox");
		getspan.innerHTML="You can only register using IIT Patna Email ID";
	}
	else{
		var getspan=document.getElementById("alertbox");
		getspan.innerHTML="";
	}
    //alert(re.test(mailaddr));
}
  </script>
<?php include ('includes/footer.php'); ?>