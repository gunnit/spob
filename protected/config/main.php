<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
require_once(dirname(__FILE__) . '/../includes/localization.php');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'SPOB',
    //language of the source files (defaults 'en_us')
    'sourceLanguage' => 'en_us',
    //default language for local user
    'language' => 'en_us',
    'behaviors' => array('ApplicationConfigBehavior'),
    //'theme'=>'twitter_fluid',
    // preloading 'log' component
    'preload' => array(
        'log',
        'bootstrap', // preload the bootstrap component
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
    // 'application.modules.user.*',
    ),
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => false,
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii',),
        ),
        'user' => array(
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/login'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        )
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'WebUser',
            'loginUrl' => array('/user/login'),
        ),
        'messages' => array(
            'class' => 'CGettextMessageSource',
            'useMoFile' => false,
        ),
        'coreMessages' => array(
            'basePath' => null,
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                'gii' => 'gii',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<action>' => 'site/<action>',
            ),
            
        ),
         'facebook'=>array(
            'class' => 'ext.yii-facebook-opengraph.SFacebook',
            'appId'=>'368892629888400', // needed for JS SDK, Social Plugins and PHP SDK
            'secret'=>'d7cb8774d5b133247963519c64aab58c', // needed for the PHP SDK
            //'fileUpload'=>false, // needed to support API POST requests which send files
            //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
            //'locale'=>'en_US', // override locale setting (defaults to en_US)
            //'jsSdk'=>true, // don't include JS SDK
            //'async'=>true, // load JS SDK asynchronously
            //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
            //'status'=>true, // JS SDK - check login status
            //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
            //'oauth'=>true,  // JS SDK - enable OAuth 2.0
            //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
            //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
            //'html5'=>true,  // use html5 Social Plugins instead of XFBML
            'ogTags'=>array(  // set default OG tags
                'title'=>'SPOB',
                'description'=>'Find a job and do it Fast',
                //'image'=>'URL_TO_WEBSITE_LOGO',
            ),
                     ),
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         * */

        // uncomment the following to use a MySQL database

        'db' => array(
            'tablePrefix' => 'tbl_',
            'connectionString' => 'mysql:host=localhost;dbname=spob',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
//                'db'=>array(
//			'connectionString' => 'mysql:host=62.149.150.173;dbname=Sql607937_3',
//                        'tablePrefix' => 'tbl_',
//			'emulatePrepare' => true,
//			'username' => 'Sql607937',
//			'password' => 'fdc626e9',
//			'charset' => 'utf8',
//		),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'ePdf' => array(
                    'class'         => 'ext.yii-pdf.EYiiPdf',
                    'params'        => array(                                           
                    'HTML2PDF'      => array(
                            'librarySourcePath' => 'application.vendors.html2pdf.*',
                            'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                            'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                                'orientation' => 'P', // landscape or portrait orientation
                                'format'      => 'A4', // format A4, A5, ...
                                'language'    => 'en', // language: fr, en, it ...
                                'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                                'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                                'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                            )
                         )
                    )
                ),    
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'defaultPageSize' => 20,
        // this is used in contact page
        'adminEmail' => 'admin@getspob.com',
    ),
);