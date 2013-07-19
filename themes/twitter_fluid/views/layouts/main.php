<?php
	Yii::app()->clientscript
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
		// use it when you need it!
		/*
		->registerCoreScript( 'jquery' )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )
		*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Fluid Bootstrap, from Twitter</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le styles -->
<style type="text/css">
  body {
	padding-top: 60px;
	padding-bottom: 40px;
  }
  .sidebar-nav {
	padding: 9px 0;
  }

	@media (max-width: 980px) {
		body{
			padding-top: 0px;
		}
	}
</style>

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>

<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><?php echo Yii::app()->name ?></a>
				<div class="nav-collapse">
					 <!-- Navbar
    ================================================== -->
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
                'type'=>'null', // null or 'inverse'
                'brand'=>'Youtube<span style="color:red;">TV</span>',
                'brandUrl'=>Yii::app()->request->baseUrl.'/index.php',
                'collapse'=>true, // requires bootstrap-responsive.css
                'items'=>array(
                    array(
                        'class'=>'bootstrap.widgets.TbMenu',
                        'items'=>array(
                            array('label'=>'Home', 
                                //'icon'=>'home',
                                'url'=>array('/site/index')),
                            array('label'=>'Videos',
                                'visible'=>!Yii::app()->user->isGuest,
                                'url'=>'#', 'items'=>array(
                                array('label'=>'Action', 'url'=>array( '/links/moviesAction')),
                                array('label'=>'Animated', 'url'=>array( '/links/moviesAnimated')),
                                array('label'=>'Comedy', 'url'=>array( '/links/moviesComedy')),
                                array('label'=>'Sci-fi', 'url'=>array( '/links/moviesScifi')),
                                array('label'=>'Horror', 'url'=>array( '/links/moviesHorror')),
                                array('label'=>'Drama', 'url'=>array( '/links/moviesDrama')),
                                array('label'=>'Romance', 'url'=>array( '/links/moviesRomance')),
                                array('label'=>'Thriller', 'url'=>array( '/links/moviesThriller')),
                                '---',
                                array('label'=>'Search', 'url'=>array( '/links/admin')),
                            )),
                              array('label'=>'TV-Shows',
                                  'visible'=>!Yii::app()->user->isGuest,
                                  'url'=>'#', 'items'=>array(
                                array('label'=>'Action', 'url'=>'#'),
                                array('label'=>'Another action', 'url'=>'#'),
                                array('label'=>'Something else here', 'url'=>'#'),
                                '---',
                                array('label'=>'NAV HEADER'),
                                array('label'=>'Separated link', 'url'=>'#'),
                                array('label'=>'One more separated link', 'url'=>'#'),
                            )),
                              array('label'=>'Sports',
                                   'visible'=>!Yii::app()->user->isGuest,
                                  'url'=>'#', 'items'=>array(
                                array('label'=>'MMA', 'url'=>'#'),
                                array('label'=>'Basket', 'url'=>'#'),
                                array('label'=>'Poker', 'url'=>'#'),
                                '---',
                                array('label'=>'NAV HEADER'),
                                array('label'=>'Separated link', 'url'=>'#'),
                                array('label'=>'One more separated link', 'url'=>'#'),
                            )),
                              array('label'=>'Documentary',
                                   'visible'=>!Yii::app()->user->isGuest,
                                  'url'=>'#', 'items'=>array(
                                array('label'=>'Action', 'url'=>'#'),
                                array('label'=>'Another action', 'url'=>'#'),
                                array('label'=>'Something else here', 'url'=>'#'),
                                '---',
                                array('label'=>'NAV HEADER'),
                                array('label'=>'Separated link', 'url'=>'#'),
                                array('label'=>'One more separated link', 'url'=>'#'),
                            )),
                        ),
                    ),
                    '<form class="navbar-search pull-left" action=""><div class="input-append">
              <input class="span2" id="appendedInputButton" type="text">
              <button class="btn" type="button">Go!</button>
            </div></form>',
                    array(
                        'class'=>'bootstrap.widgets.TbMenu',
                        'htmlOptions'=>array('class'=>'pull-right'),
                        'items'=>array(
                            array('label'=>'Submit a Movie', 'visible'=>!Yii::app()->user->isGuest,'url'=>array( '/links/create')),
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)

                        ),
                    ),
                ),
                )); ?>
					<p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
			<?php echo $content ?>
          </div>
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->
</body>
</html>
