<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LoginPage</title>
    <link rel="stylesheet" href="cataloguesystem.css">
     <script>
function validateForm() {

  var username = document.forms["myForm"]["username"].value;
  var password = document.forms["myForm"]["pwd"].value;

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
<body style="background-color:powderblue;">
<div class= "login wrapper">
<h1><center>Login Page</center></h1>
</div>
<center>
<form name="myForm" action="login.php" method="post" >


  <div class="container wrapper">
    <label for="uname"><h1>Username</h1></label>

 
    <input required oninvalid="this.setCustomValidity('Enter username')" class = "loginuser" oninput="InvalidMsg('user',this);" name="username" type="text" placeholder="Enter Username" /> 
    
    <label for=pwd><h1>Password</h1></label>
 <input required oninvalid="this.setCustomValidity('Enter password')" class="loginpassword" oninput="InvalidMsg('pass',this);" name="pwd" type="password"  placeholder="Enter Password" /> 
 

  <input type="submit" name="submit" value="Login" class="demogetin"><br>
   <input type="submit"name="Close" value="Cancel" class="demologinclose" onclick="window.open('', '_self', ''); window.close();">
 
    <?php
        session_start();
        if (isset($_SESSION['error']))
        {
          $Color = "red";
        echo '<div style="Color:'.$Color.'">'.$_SESSION['error'].'</div>';
        unset($_SESSION['error']);
        }
    ?>

<p> Unable To Login? Please<br>
  <a href="signup.html"> Register </a>
</p>   
    

  
</form>
</div>
</center>
</body>
</html>

