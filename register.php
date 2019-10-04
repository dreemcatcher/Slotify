<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
  $account = new Account($con);

  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");


  function getInputValue($name){
    if(isset($_POST[$name])){
      echo $_POST[$name];
      $_POST[$name];
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome to Slotify!</title>
</head>
<body>
  <div id="inputContainer">
    <form id="loginForm" action="register.php" method="POST">
      <h2>Login to your account</h2>
      <p>
        <label for="loginUsername">Username</label>
        <input id="loginUsername" name="loginUsername" type="text" placeholder="username" required>
      </p>
      <p>
        <label for="loginPassword">Password</label>
        <input id="loginPassword" name="loginPassword" type="Password" placeholder="YUOR Password"  required>
      </p>
      <button type="submit" name="loginButton">LOG IN</button>
    </form>
    <form id="registerForm" action="register.php" method="POST">
      <h2>Create your free account</h2>
      <p>
        <?php echo $account->getError(Constants::$usernameCharacters); ?>
        <?php echo $account->getError(Constants::$usernameTaken); ?>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" placeholder="username" value="<?php echo getInputValue('username'); ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
        <label for="firstName">First name</label>
        <input id="firstName" name="firstName" type="text" placeholder="First name" value="<?php echo getInputValue('firstName'); ?>" required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
        <label for="lastName">Last name</label>
        <input id="lastName" name="lastName" type="text" placeholder="Last name" value="<?php echo getInputValue('lastName'); ?>"  required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$emailDoNotMatch); ?>
        <?php echo $account->getError(Constants::$emailInvalid); ?>
        <?php echo $account->getError(Constants::$emailTaken); ?>
        <label for="email">Email</label>
        <input id="email" name="email" type="email" placeholder="email@mail.ru" value="<?php echo getInputValue('email'); ?>"  required>
      </p>
      <p>
        <label for="email2">Confirm email</label>
        <input id="email2" name="email2" type="text" placeholder="username" value="<?php echo getInputValue('email2'); ?>"  required>
      </p>
      <p>
        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
        <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
        <?php echo $account->getError(Constants::$passwordCharacters); ?>
        <label for="password">Password</label>
        <input id="password" name="password" type="Password" placeholder="YUOR Password" required>
      </p>
      <p>
        <label for="password2">Confirm password</label>
        <input id="password2" name="password2" type="Password" placeholder="YUOR Password" required>
      </p>
      <button type="submit" name="registerButton">SIGN UP</button>
    </form>
  </div>
</body>
</html>