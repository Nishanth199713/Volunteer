

<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LoginPage</title>
    <link rel="stylesheet" href="cataloguesystem.css">
     <script>
function validateForm() {

  var username = document.forms["myForm"]["username"].value;
  var password = document.forms["myForm"]["pwd"].value;
5
  var submit = true;

    if(username==null || username == "")
     {
        window.alert("Please enter your username."); 
        username.focus(); 
        return false; 
      }

    if(pwd == "")
     {
        window.alert("Please enter your password."); 
        password.focus(); 
        return false;
     }


(function (exports) {
    function valOrFunction(val, ctx, args) {
        if (typeof val == "function") {
            return val.apply(ctx, args);
        } else {
            return val;
        }
    }

    function InvalidInputHelper(input, options) {
        input.setCustomValidity(valOrFunction(options.defaultText, window, [input]));

        function changeOrInput() {
            if (input.value == "") {
                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
            } else {
                input.setCustomValidity("");
            }
        }

        function invalid() {
            if (input.value == "") {
                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
            } else {
               input.setCustomValidity(valOrFunction(options.invalidText, window, [input]));
            }
        }

        input.addEventListener("change", changeOrInput);
        input.addEventListener("input", changeOrInput);
        input.addEventListener("invalid", invalid);
    }
    exports.InvalidInputHelper = InvalidInputHelper;
})(window);



InvalidInputHelper(document.getElementById("email"), {
    defaultText: "Please enter an email address!",
    emptyText: "Please enter an email address!",
    invalidText: function (input) {
        return 'The email address "' + input.value + '" is invalid!';
    }
});
}
    function InvalidMsg(id,textbox) { 

      if (id == 'user' && textbox.value === '') { 
        textbox.setCustomValidity 
          ('Enter password'); 
      }
      if (id == 'pass' && textbox.value === '') { 
        textbox.setCustomValidity 
          ('Enter password'); 
      }
      else 
      { 
        textbox.setCustomValidity(''); 
      } 

      return true; 
    } 
</script>
  </head>
<body>
<div class= "login wrapper">
<h1>Login Page</h1>
</div>
<form name="myForm" action="login2.php" method="post">
         <div class="imgcontainer">
    <img src="images/login.png" alt="Avatar" class="avatar">
  </div>

  <div class="container wrapper">
    <label for="uname"><h1>Username</h1></label>

 
    <input required oninvalid="this.setCustomValidity('Enter username')" class = "loginuser" oninput="InvalidMsg('user',this);" name="username" type="text" placeholder="Enter Username" /> 
    
    <label for=pwd><h1>Password</h1></label>
 <input required oninvalid="this.setCustomValidity('Enter password')" class="loginpassword" oninput="InvalidMsg('pass',this);" name="pwd" type="password"  placeholder="Enter Password" /> 
 

  <input type="submit" name="submit" value="Get in" class="demogetin">
   <input type="submit"name="Close" value="Close" class="demologinclose" onclick="window.open('', '_self', ''); window.close();">
  
   <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>

    <?php
        session_start();
        if (isset($_SESSION['error']))
        {
          $Color = "red";
        echo '<div style="Color:'.$Color.'">'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']);
        }
    ?>

<p> Don't have an account? Click to
  <a href="register.html"> Register </a>
</p>
</form>
</div>
</body>
</html>
