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
            'password' => 'youtubetv',
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
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         * */

        // uncomment the following to use a MySQL database

//        'db' => array(
//            'tablePrefix' => 'tbl_',
//            'connectionString' => 'mysql:host=localhost;dbname=spob',
//            'emulatePrepare' => true,
//            'username' => 'root',
//            'password' => '',
//            'charset' => 'utf8',
//        ),
                'db'=>array(
			'connectionString' => 'mysql:host=62.149.150.173;dbname=Sql607937_4',
                        'tablePrefix' => 'tbl_',
			'emulatePrepare' => true,
			'username' => 'Sql607937',
			'password' => 'fdc626e9',
			'charset' => 'utf8',
		),

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
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'defaultPageSize' => 20,
        // this is used in contact page
        'adminEmail' => 'admin@getspob.com',
    ),
);