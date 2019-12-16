<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login Form</title>

    <style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 150;
  font-size: 12px;
  line-height: 30px;
  color:  rgb(0, 0, 0);
  background: #4CAF50;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}


#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 100px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact input[type="password"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact input[type="password"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.5s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background 0.3s ease-in-out;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}
</style> 

</head>
<body>

<div class="container">  
        <form class="login-form" id='contact' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    
      
          <fieldset>
            <input type="text" name="user" placeholder="Username" required autofocus/><br>
          </fieldset>
      
      
          <fieldset>
            <input type="password" name="pass"  placeholder="Password" required> <br>
          </fieldset>        
      
          <fieldset>
            <button name="submit" type="submit" >Submit</button>
          </fieldset>    
        </form>
        <fieldset>
        <form class="login-form" id='contact' action='index.html'>  <button name="submit" type="submit" >Goto Home Page</button></form>
        </fieldset>


</div>

<div class=login>

<?php


// define variables and set to empty values
$user = $pass = $email = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  //echo $data; // echo '<script language="javascript">';//echo 'alert("message successfully sent")';//echo '</script>';  //echo '<br>';
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
$user = test_input($_POST["user"]);
$pass = test_input($_POST["pass"]);

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "examdb";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  


  $stmt = $conn->prepare("SELECT user,pass FROM ex WHERE user=? AND pass=?");
  $stmt->execute([$user,$pass]);
  //echo $stmt; 
  $res = $stmt->fetch();
  //echo 'Res:';

  //echo $res;
  echo '<pre>'; print_r($res); echo '</pre>';

  //echo $res[0];
  $temp = $res[0];
  if ($temp == $user)
  {
    header("Location: /exam/success.html");
    
  }
  else
  {
    
  
  echo '<script language="javascript">';
  echo 'alert("Invalid Username or Password")';
  echo '</script>';
  }
}

catch(PDOException $e)
  {
  echo $sql . "<br>" . $e->getMessage();
  }

$conn = null;


}


?>
</div>
<br><br>




<br><br>



</body>
</html>