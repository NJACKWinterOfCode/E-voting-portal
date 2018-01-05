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
.input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
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

</style>
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
  <div class="form">
    <form action="logs.php" method="POST" class="login-form">
        <input type="text" class="input" tabindex="1" maxlength="10" autofocus placeholder="Roll No. *" required name="roll" value="<?php
        if (isset($roll) && !empty($roll)) {
            echo $roll;
        }
        ?>">
        <input type="password" class="input" placeholder="Password  * " maxlength="40"required tabindex="2" name="password">
        <input type="submit" class="submit" tabindex="3" value="LOGIN">
		    <p>Not Yet Registered?<br><a tabindex="4" href="signs.php">Register Here</a></p>
    </form>
  </div>
</div>

<?php include ('includes/footer.php'); ?>