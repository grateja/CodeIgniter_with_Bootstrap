<ul class="nav navbar-nav navbar-right">

	<?php if(isset($display_name)){ ?>

  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="" aria-expanded="false"><?=$display_name ?><span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="<?=base_url('Membership/account')?>">My account</a></li>
      <li><a href="<?=base_url('Membership/logout')?>">Logout</a></li>
    </ul>
  </li>

	<?php } else { ?>

	<li><a href="<?=base_url('Membership/login')?>">Login</a></li>
	<li><a href="<?=base_url('Membership/signup')?>">Sign up</a></li>

	<?php } ?>
</ul>