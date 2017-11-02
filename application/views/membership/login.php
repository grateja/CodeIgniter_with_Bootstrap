<div class="container">
  <div class="login">
    <form action="<?=base_url('Membership/login_attempt')?>" method="POST" novalidate>
      <div class="form-group row <?=$username_error?'has-error':'' ?>">
        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" class="form-control" id="inputEmail" placeholder="Username or Email" name="username">
        </div>
        <?php if($username_error):?>
        <div class="col-sm-12 text-center alert-danger alert">Invalid username or email</div>
        <?php endif; ?>
      </div>

      <div class="form-group row <?=$password_error?'has-error':'' ?>">
        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
        </div>
        <?php if($password_error):?>
        <div class="col-sm-12 alert-danger text-center alert">Wrong password</div>
        <?php endif; ?>
      </div>

      <div class="form-group row">
        <div class="col-sm-9 col-sm-offset-3">
          <input type="submit" class="btn btn-primary" value="login">
        </div>
      </div>
    </form>
  </div>
</div>