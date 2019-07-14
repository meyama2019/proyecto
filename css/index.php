<!DOCTYPE html>
<html>
<head>
  <title>Acceso Restringido</title>
   <script type="text/javascript" src="http://localhost/proyecto/js/jquery.js"></script>
    <script type="text/javascript" src="http://localhost/proyecto/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css"  href="http://localhost/proyecto/css/signin.css">
</head>
<body>
  <form class="form-signin">
  <img class="mb-4" src="{{ site.baseurl }}/docs/{{ site.docs_version }}/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <a class="btn btn-lg btn-primary btn-block" href="http://localhost/proyecto/home.php">Ir a Home</a>
</form>
</body>
</html>




