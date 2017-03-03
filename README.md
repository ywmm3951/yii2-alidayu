yii2-alidayu
============
alidayu for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require ywmm3951/yii2-alidayu "dev-master"
```

or add

```
"ywmm3951/yii2-alidayu": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

配置文件添加组件:

```
'components' => [
    'alidayu' => [
        'class' => 'ywmm3951\alidayu\SendCaptcha',
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