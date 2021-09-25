
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?t=1632575248705"><script src="https://kit.fontawesome.com/fcc2559b13.js" crossorigin="anonymous"></script>
    <title>web</title>
  </head>
  <body> 
    <header class="header" id="header"><a class="logo" href="./"><img src="./assets/images/logo-2.png" alt="web logo"></a>
      <div class="topbar" id="topbar">
        <div class="topbar__icon" data-type="login"><i class="fa fa-user"></i><span>Log in</span></div>
        <div class="topbar__icon" data-type="register"><i class="fa fa-user-plus"> </i><span>Registrer </span></div>
        <div class="toggle-menu">
          <div class="toggle-menu__icon" id="toggle-menu">
            <div class="first-bar"> </div>
            <div class="second-bar"> </div>
            <div class="third-bar">    </div>
          </div>
        </div>
      </div>
    </header>
    <div class="sidebar" id="sidebar">
      <nav class="main-nav" id="main-nav">
        <ul class="main-menu" id="main-menu">
          <li class="main-menu__item"><a class="main-menu__link" href="./">home</a>
          </li>
          <li class="main-menu__item"><a class="main-menu__link" href="./about.php">about</a>
          </li>
          <li class="main-menu__item"><a class="main-menu__link" href="./contact.php">contact</a>
          </li>
        </ul>
      </nav>
    </div>
    <main class="main"> 
      <h1 class="title">Contact</h1>
    </main>
    <div class="lightbox" id="login-modal">
      <form class="form" method="#" id="login-form"> 
        <div class="form__field">
          <label class="form__label" for="login-email">User</label>
          <input class="form__input" type="text" name="user" id="login-user">
        </div>
        <div class="form__field">   
          <label class="form__label" for="login-password">Password</label>
          <input class="form__input" type="password" name="password" id="login-password">
        </div>
        <div class="form__field">
          <input class="form__submit" type="submit" name="submit" value="Iniciar sesion">
        </div>
      </form>
    </div>
    <!--Formulario para registrar un usuario-->
    <div class="lightbox" id="register-modal">    
      <form class="form" id="register-form">
        <div class="form__field"> 
          <label class="form__label" for="register-nom">Name</label>
          <input class="form__input" type="text" name="nom" id="register-nom">
        </div>
        <div class="form__field"> 
          <label class="form__label" for="register-last-name">Last Name</label>
          <input class="form__input" type="text" name="last-name" id="register-last-name">
        </div>
        <div class="form__field"> 
          <label class="form__label" for="register-phone">Phone Number</label>
          <input class="form__input" type="text" name="phone" id="register-phone">
        </div>
        <div class="form__field"> 
          <label class="form__label" for="register-email">Email</label>
          <input class="form__input" type="email" name="email" id="register-email">
        </div>
        <div class="form__field"> 
          <label class="form__label" for="register-password">Password</label>
          <input class="form__input" type="password" name="password" id="register-password">
        </div>
        <div class="form__field"> 
          <input class="form__submit" type="submit" name="button" value="Save" id="register-submit">
        </div>
      </form>
    </div>
    <script src="js/scripts-min.js?t=1632575248705"> </script>
  </body>
</html>