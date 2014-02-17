<div class="container">
  <div class="text-center">
    <img src="<?php echo base_url('assets/metisadmin/img/logo.png')?>" alt="Metis Logo">
  </div>
  <div class="tab-content">
    <div id="login" class="tab-pane active">

       <form method="post" class="form-signin" action="<?php echo base_url('backoffice/login/auth');?>">
        <p class="muted text-center">
        Enter your username and password
        </p>
        <input type="text" name="username"  placeholder="Username" class="input-block-level">
        <input type="password" name="password"  placeholder="Password" class="input-block-level">
        <button class="btn btn-large btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
    <div id="forgot" class="tab-pane">
      <form action="index.html" class="form-signin">
        <p class="muted text-center">
        Enter your valid e-mail
        </p>
        <input type="email" placeholder="mail@domain.com" required="required" class="input-block-level">
        <br>
        <br>
        <button class="btn btn-large btn-danger btn-block" type="submit">Recover Password</button>
      </form>
    </div>
    <div id="signup" class="tab-pane">
      <form action="index.html" class="form-signin">
        <input type="text" placeholder="username" class="input-block-level">
        <input type="email" placeholder="mail@domain.com" class="input-block-level">
        <input type="password" placeholder="password" class="input-block-level">
        <button class="btn btn-large btn-success btn-block" type="submit">Register</button>
      </form>
    </div>
  </div>
  <div class="text-center">
    <ul class="inline">
      <li><a class="muted" href="#login" data-toggle="tab">Login</a></li>
      <li><a class="muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
      <li><a class="muted" href="#signup" data-toggle="tab">Signup</a></li>
    </ul>
  </div>
  </div> <!-- /container -->
  
  <script src="<?php echo base_url('assets/metisadmin/js/vendor/jquery-1.10.1.min.js');?>"></script>
  <script src="<?php echo base_url('assets/metisadmin/js/vendor/bootstrap.min.js');?>"></script>
  <script>
  $('.inline li > a').click(function() {
  var activeForm = $(this).attr('href') + ' > form';
  //console.log(activeForm);
  $(activeForm).addClass('magictime swap');
  //set timer to 1 seconds, after that, unload the magic animation
  setTimeout(function() {
  $(activeForm).removeClass('magictime swap');
  }, 1000);
  });
  </script>