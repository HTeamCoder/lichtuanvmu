<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaed39ad1b5103541f523a8477fafa0f1
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\swiftmailer\\' => 16,
            'yii\\gii\\' => 8,
            'yii\\faker\\' => 10,
            'yii\\debug\\' => 10,
            'yii\\composer\\' => 13,
            'yii\\codeception\\' => 16,
            'yii\\bootstrap\\' => 14,
            'yii\\' => 4,
        ),
        't' => 
        array (
            'tuyakhov\\youtube\\' => 17,
        ),
        'm' => 
        array (
            'moonland\\phpexcel\\' => 18,
            'mihaildev\\ckeditor\\' => 19,
        ),
        'k' => 
        array (
            'kartik\\time\\' => 12,
            'kartik\\plugins\\fileinput\\' => 25,
            'kartik\\file\\' => 12,
            'kartik\\datetime\\' => 16,
            'kartik\\base\\' => 12,
        ),
        'd' => 
        array (
            'dosamigos\\datetimepicker\\' => 25,
            'dosamigos\\datepicker\\' => 21,
            'dosamigos\\ckeditor\\' => 19,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\swiftmailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-swiftmailer',
        ),
        'yii\\gii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-gii',
        ),
        'yii\\faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-faker',
        ),
        'yii\\debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-debug',
        ),
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\codeception\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-codeception',
        ),
        'yii\\bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-bootstrap',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'tuyakhov\\youtube\\' => 
        array (
            0 => __DIR__ . '/..' . '/tuyakhov/yii2-youtube',
        ),
        'moonland\\phpexcel\\' => 
        array (
            0 => __DIR__ . '/..' . '/moonlandsoft/yii2-phpexcel',
        ),
        'mihaildev\\ckeditor\\' => 
        array (
            0 => __DIR__ . '/..' . '/mihaildev/yii2-ckeditor',
        ),
        'kartik\\time\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-timepicker',
        ),
        'kartik\\plugins\\fileinput\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/bootstrap-fileinput',
        ),
        'kartik\\file\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-fileinput',
        ),
        'kartik\\datetime\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-datetimepicker',
        ),
        'kartik\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-krajee-base',
        ),
        'dosamigos\\datetimepicker\\' => 
        array (
            0 => __DIR__ . '/..' . '/2amigos/yii2-date-time-picker-widget/src',
        ),
        'dosamigos\\datepicker\\' => 
        array (
            0 => __DIR__ . '/..' . '/2amigos/yii2-date-picker-widget/src',
        ),
        'dosamigos\\ckeditor\\' => 
        array (
            0 => __DIR__ . '/..' . '/2amigos/yii2-ckeditor-widget/src',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPExcel' => 
            array (
                0 => __DIR__ . '/..' . '/phpoffice/phpexcel/Classes',
            ),
        ),
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'D' => 
        array (
            'Diff' => 
            array (
                0 => __DIR__ . '/..' . '/phpspec/php-diff/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaed39ad1b5103541f523a8477fafa0f1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaed39ad1b5103541f523a8477fafa0f1::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitaed39ad1b5103541f523a8477fafa0f1::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
