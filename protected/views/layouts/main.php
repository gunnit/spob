<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl;?>/images/shortcut_icon.gif" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl;?>/images/shortcut_icon.gif" type="image/x-icon" />

        <?php
        Yii::app()->clientscript
                ->registerCssFile(Yii::app()->request->baseUrl . '/css/awesome/css/font-awesome.min.css')
                ->registerCssFile(Yii::app()->request->baseUrl . '/css/main.css')
                ->registerCssFile(Yii::app()->request->baseUrl . '/css/custom.css')
        ?>

        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-17621815-9', 'getspob.com');
            ga('send', 'pageview');

        </script>
        <body>

            <?php
            $curpage = Yii::app()->getController()->getAction()->controller->id;
            $curpage .= '/' . Yii::app()->getController()->getAction()->controller->action->id;

            switch ($curpage) {
                //PROJECT PAGES // SEARCH PAGES
                //RES4MED PAGES
                case 'site/home':
                    $kms = 'kms';
                    break;
                case 'site/index':
                case 'projectstatus/update':
                    $res4med = 'res4med';
                    break;
                case 'bridgegroup/admin';
                    $private = 'private';
                    break;
                default:
                    echo $curpage;
                    echo 'res4med';
            }
            ?>

            <div class="container" id="page">

                <div id="header">
                    <br/>
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('application.extensions.exbreadcrumbs.EXBreadcrumbs', array(
                            'collapsible' => true,
                            'collapsedWidth' => 15,
                            'links' => $this->breadcrumbs,
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>

                </div><!-- header -->

                <div id="mainmenu">
                    <!-- Navbar
               ================================================== -->
                    <?php
                    if (empty(Yii::app()->user->name)) {
                        $user = Yii::app()->user->username;
                    } else {
                        $user = Yii::app()->user->name;
                    }
                    $this->widget('bootstrap.widgets.TbNavbar', array(
                        'type' => 'null', // null or 'inverse'
                       //'brand' => '<img class="bg-logo" alt="" src="'.Yii::app()->request->baseUrl.'/images/home_banner.png">',
                       'brand' => '<img class="spoberlogo" alt="SPOB" src="'.Yii::app()->request->baseUrl.'/images/spober_small.png">',
                        
                        'brandUrl' => Yii::app()->request->baseUrl . '/index.php',
                        'collapse' => true, // requires bootstrap-responsive.css
                        'items' => array(
                            array(
                                'class' => 'bootstrap.widgets.TbMenu',
                                'items' => array(
                                    array('label' => __('Home'),
                                        //'icon'=>'home',
                                        'url' => array('/site/index')),
                                    array('label' => __('Employee'),
                                        'visible' => Yii::app()->getModule('user')->isEmployee() && !Yii::app()->user->isGuest,
                                        'url' => '#',
                                        'items' => array(
                                            array(
                                                'label' => __('Profile'),
                                                'url' => array('/profiles/profile')),
                                            array(
                                                'label' => __('Applied For Jobs'),
                                                'url' => array('/bridgecontract/employee')),
                                            array(
                                                'label' => __('List all Jobs'),
                                                'url' => array('/employercontract/index')),
                                            array(
                                                'label' => __('Search For Jobs'),
                                                'url' => array('/employercontract/admin')),
                                        )
                                    ),
                                    array('label' => __('Employer'),
                                        'visible' => !Yii::app()->getModule('user')->isEmployee() && !Yii::app()->user->isGuest,
                                        'url' => '#',
                                        'items' => array(
                                            array(
                                                'label' => __('Profile'),
                                                //'url' => Yii::app()->getModule('user')->profileUrl),
                                                'url' => array('/profiles/profilec')),
                                            array(
                                                'label' => __('My Published Jobs'),
                                                'url' => array('/employercontract/contractor')),
                                            array(
                                                'label' => __('List all Jobs'),
                                                'url' => array('/employercontract/index')),
                                            array(
                                                'label' => __('Create a New Job'),
                                                'url' => array('/employercontract/create')),
                                            array(
                                                'label' => __('Search For Jobs'),
                                                'url' => array('/employercontract/admin')
                                            ),
                                        ),
                                    ),
                                    array(
                                        'label' => __('Feedback'),
                                        'icon' => 'envelope-alt ',
                                        'visible' => !Yii::app()->user->isGuest,
                                        'url' => array('/feedback/index')
                                    ),
                                ),
                            ),
                            array(
                                'class' => 'bootstrap.widgets.TbMenu',
                                'htmlOptions' => array('class' => 'pull-right'),
                                'items' => array(
                                    array(
                                        'url' => Yii::app()->getModule('user')->loginUrl,
                                        'label' => __('Login'),
                                        'visible' => Yii::app()->user->isGuest),
//                                    array(
//                                        'url' => Yii::app()->getModule('user')->registrationUrl,
//                                        'label' => __('Register'),
//                                        'visible' => Yii::app()->user->isGuest),
                                    array(
                                        'url' => array('/site/page', 'view' => 'option'),
                                        'label' => __('Register'),
                                        'visible' => Yii::app()->user->isGuest),
                                    array(
                                        'url' => Yii::app()->getModule('user')->logoutUrl,
                                        'label' => __('Logout') . ' (' . $user . ')',
                                        'icon' => 'icon-key',
                                        'visible' => !Yii::app()->user->isGuest),
                                ),
                            ),
                        ),
                    ));
                    ?>
                </div><!-- mainmenu -->
                    <?php
//                if (Yii::app()->getModule('user')->isEmployee() == 1) {
//                    $isemployee = 'True';
//                } else {
//                    $isemployee = 'False';
//                }
//                echo $isemployee . '=isEmployye';
                    ?>
                <?php echo $content; ?>

                <div class="clear"></div>


            </div><!-- page -->
            <div id="footer">
                <div class="homepage-menu">
                    <div class="menu">
                        <div class="social-icons">

                            <div class="g-plus social-icon">
                                <a href="#" 
                                   rel="publisher">
                                    <img 
                                        src="#" 
                                        alt="Google+" 
                                        style="border:0;width:16px;height:16px;">
                                </a>
                            </div>
                            <div class="tweet social-icon">


                            </div>
                            <div class="footer-lang">
                            <?php $this->widget('application.components.langbox'); ?>
                            </div>

                        </div>    

                        <div class="footer-menu-wrapper">
                            <div class="footer-menu-links">
                                <?php echo CHtml::link(__('SPOB'), array('/site/index')); ?> |                                 
                                <?php // echo CHtml::link(__('Jobs by Suburb'), array('/employercontract/admin'));  ?>  
                                <?php // echo CHtml::link(__('Retail Jobs'), array('/employercontract/admin')); ?>  
                                <?php echo CHtml::link(__('About'), array('/site/page', 'view' => 'about',)); ?> | 
                                <?php echo CHtml::link(__('FAQ'), array('/site/page', 'view' => 'faq',)); ?> | 
                                <?php echo CHtml::link(__('Get in Touch'), array('/site/contact')); ?> |
                                <?php echo CHtml::link(__('Why Post a Job'), array('/site/page', 'view' => 'employer',)); ?>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="container">
                    <p class="muted credit">

                    </p>
                    <!-- langBox -->   
                </div>
            </div>
        </body>
</html>
