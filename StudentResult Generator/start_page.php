<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="start_page.js" defer></script>
</head>

<body style='margin:0'>


    <div id='main_layout'>
            <div id='content' style='position:absolute'>
                <br><br><br><br><br><br>
                <img src='./images/logo.PNG' width='400px' height='300px' style='margin-left:50px'>
                <br>
                <h2 style='margin-left: 50px'><span>STUDENT RESULT GENERATOR</span></h2>
                <button id="login_btn" style='margin-left: 50px'>LOGIN</button><br>
                <button id="signup_btn" style='margin-left: 50px'>SIGNUP</button>
        </div>
        <div id="blanket"></div>
    </div>


    <div id='modal_login' class='modal_window'>
        <h2 style='text-align:center'>LOGIN</h2>
        <br>
        <img src='./images/login.PNG' width='100px' height='100px' style='margin-left:150px'>
        <form action="controller.php" method="post">
            <input type='hidden' name='page' value='StartPage'>
            <input type='hidden' name='command' value='Login'>

            <label style = 'margin-top: 50px' for="Username">Username:</label>
            <input type="text" name="Username" required><br>

            <label for="Password">Password:</label>
            <input type="Password" name="Password" required><br>

            <button id='modal_cancel_login' type="reset" style='position:absolute; bottom:10px; right:10px'>Cancel</button>
            <button id='modal_login' type="submit" style='position:absolute; bottom:10px; left:10px'>Submit</button>
        </form>
    </div>

    <div id='modal_signup' class='modal_window'>
        <h2 style='text-align:center'>SIGNUP</h2>
        <br>
        <form action="controller.php" method="post">
            <input type='hidden' name='page' value='StartPage'>
            <input type='hidden' name='command' value='SignUp'>

            <label for="FullName">Full Name:</label>
            <input type="text" name="FullName" required><br>

            <label for="Username">Username:</label>
            <input type="text" name="Username" required><br>

            <label for="Password">Password:</label>
            <input type="Password" name="Password" required><br>

            <label for="Email">Email:</label>
            <input type="email" name="Email" required><br>

            <label for="Degree">Degree:</label>
            <input type="text" name="Degree" required><br>

            <label for="Year">Degree Year:</label>
            <input type="number" name="Year" min="1" max="5" required><br>

            <label for="Program">Program:</label>
            <input type="text" name="Program" required><br>

            <label for="University">University:</label>
            <input type="text" name="University" required><br>

            <button id='modal_cancel_signup' type="reset" style='position:absolute; bottom:10px; right:10px'>Cancel</button>
            <button id='modal_submit' type="submit" style='position:absolute; bottom:10px; left:10px'>Submit</button>
        </form>
    </div>


    <div id='signin-box' class='modal_window' style="display:none;">
        <h2 style='text-align:center'>LOGIN</h2>
        <br>
        <img src='./images/login.PNG' width='100px' height='100px' style='margin-left:150px'>
        <form action="controller.php" method="post">
            <input type='hidden' name='page' value='StartPage'>
            <input type='hidden' name='command' value='Login'>

            <label for="Username">Username:</label>
            <input type="text" name="Username" required><?php if (!empty($error_msg_username)) echo $error_msg_username;?><br> 
           
            <label for="Password">Password:</label> 
            <input type="Password" name="Password" required><?php if (!empty($error_msg_password)) echo $error_msg_password;?><br> 
           
            <button id='modal_cancel' type="reset" style='position:absolute; bottom:10px; right:10px' onclick="hide_signin();">Cancel</button>
            <button id='modal_submit' type="submit" style='position:absolute; bottom:10px; left:10px'>submit</button>
        </form>
    </div>

    <div id='signup-box' class='modal_window'>
        <h2 style='text-align:center'>SIGNUP</h2>
        <br>
        <form action="controller.php" method="post">
            <input type='hidden' name='page' value='StartPage'>
            <input type='hidden' name='command' value='SignUp'>

            <label for="FullName">Full Name:</label>
            <input type="text" name="FullName" required><br>

            <label for="Username">Username:</label>
            <input type="text" name="Username" required><?php if (!empty($error_msg_username)) echo $error_msg_username;?><br>
            
            <label for="Password">Password:</label>
            <input type="Password" name="Password" required><br>
            
            <label for="Email">Email:</label>
            <input type="Email" name="Email" required><br>

            <label for="Degree">Degree:</label>
            <input type="text" name="Degree" required><br>

            <label for="Year">Degree Year:</label>
            <input type="number" name="Year" min="1" max="5" required><br>

            <label for="Program">Program:</label>
            <input type="text" name="Program" required><br>

            <label for="University">University:</label>
            <input type="text" name="University" required><br>
            
            <button id='cancel_signup' type="reset" style='position:absolute; bottom:10px; right:10px' onclick="hide_signin();">Cancel</button>
            <button id='modal_submit' type="submit" style='position:absolute; bottom:10px; left:10px'>Submit</button>
        </form>
    </div>

</body>

</html>

<script>
    function show_signin() {
        document.getElementById('signin-box').style.display = 'block';
    }

    function show_signup() {
        document.getElementById('signup-box').style.display = 'block';
    }

    function hide_signin(){
        document.getElementById('signin-box').style.display = 'none';
        document.getElementById('signup-box').style.display = 'none';
    }
    window.addEventListener('load', function() {
        <?php
             if ($display_modal_window == 'signin')
                echo 'show_signin();';
            elseif($display_modal_window == 'signup'){
                echo 'show_signup();';
            }
        ?>
    });

</script>


