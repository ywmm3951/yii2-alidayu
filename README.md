yii2-alidayu
============
alidayu for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ywm/yii2-alidayu "*"
```

or add

```
"ywm/yii2-alidayu": "*"
```

to the require section of your `composer.json` file.


Usage
-----

配置文件添加组件:

```
'components' => [
    'alidayu' => [
        'class' => 'ywm\alidayu\SendCaptcha',
        'appkey' => 'xxx', // 阿里大于 appkey
        'secretKey' => 'xxx', // 阿里大于 secretKey
        'signName' => 'xxx', // 短信签名
        'templateCode' => 'xxx', // 短信模板ID
    ],
],
```

调用:

```
<?php
use Yii;
/**
 * 发送验证码
 * @return boolean true|false
 */
Yii::$app->alidayu->sendSMS($mobile, $content);
```