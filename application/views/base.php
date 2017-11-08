<!DOCTYPE html>
<!--[if IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title><?=isset($title) ? $title : $this->config->item('default_title') ?></title>
        <script type="text/javascript">
            base_url = "<?=base_url()?>";
        </script>
        <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>" />
        <link rel="stylesheet" type="text/css" href="<?=base_url('css/default.css')?>" />
        <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"> -->
        <?php
        if(isset($css)){
            foreach ($css as $value) {
                echo link_tag(base_url('css/'.$value.'.css'));
            }
        }
        if(isset($js)){
            foreach ($js as $value) {
                echo link_tag(base_url('js/'.$value.'.js'));
            }
        }
        ?>
        <script type="text/javascript" src="<?=base_url('js/jquery-3.2.1.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('js/bootstrap.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('js/default.js')?>"></script>
        <?php if(!isset($_SESSION['js_msg_closed'])) {
        echo "<noscript><div class='noscript'>Please enable javascript for a better experience <a href=" . base_url("default_/disable_js/?rdr=".base_url(uri_string())) .">close</a></div></noscript>";
        } ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-expanded="true">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand"><a href="<?=base_url()?>">Gratch Library System</a></div>
                </div>
                <div class="navbar-collapse collapse in" id="myNavbar" aria-expanded="true" style="">
                    <?=$nav ?>
                    <?=$membership_link ?>
                </div>
            </div>
        </nav>

        <?=$content;?>
        <div class="footer">
            <div class="container">
            gratch@keme.lang
            </div>
        </div>
    </body>
</html>