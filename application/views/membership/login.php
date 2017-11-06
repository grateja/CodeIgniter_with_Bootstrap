<div class="container">
  <div class="login">
    <form action="<?=base_url('Membership/login_attempt')?>" method="POST">
      <div class="form-group row <?=$username_error?'has-error':'' ?>">
        <label for="username" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="username" placeholder="Username or Email" name="username" required value=<?=$username?>>
        </div>
        <?= isset($username_error)?$username_error:'' ?>
      </div>

      <div class="form-group row <?=$password_error?'has-error':'' ?>">
        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
        </div>
        <?= isset($password_error)?$password_error:'' ?>
      </div>

      <div class="form-group row">
        <div class="col-sm-9 col-sm-offset-3">
          <input type="submit" class="btn btn-primary" value="Login">
        </div>
      </div>
    </form>
  </div>
</div>