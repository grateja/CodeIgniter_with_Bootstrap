<html>
<head>
	<title><?=isset($title) ? $title : $this->config->item('default_title') ?></title>
	<script type="text/javascript">
		base_url = "<?=base_url()?>";
	</script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/layout.css" />
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"> -->
	<?php
	if(isset($css)){
		foreach ($css as $value) {
			echo link_tag(base_url().'css/'.$value.'.css');
		}
	}
	if(isset($js)){
		foreach ($js as $value) {
			echo link_tag(base_url().'js/'.$value.'.js');
		}
	}
	?>
	<script type="text/javascript" src="<?=base_url()?>js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/default.js"></script>
	<?php if(!isset($_SESSION['js_msg_closed'])) {
	echo "<noscript><div class='noscript'>Please enable javascript for a better experience <a href=" . base_url() . "default_/disable_js/?rdr=".base_url(uri_string()).">close</a></div></noscript>";
	} ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="container">
		<div class="header"><?=isset($header)?$header:""?></div>
		<div class="section"><?=isset($section)?$section:""?></div>
		<div class="footer"><?=isset($footer)?$footer:"&copy; All rights reserved"?></div>
	</div>
</body>
</html>