<?php
/**
 * 发送验证码组件
 * @author ywm 
 */
namespace ywm\alidayu;

use Yii;
use yii\base\Component;

class SendCaptcha extends Component 
{
	/**
     * @var string 阿里大于 appkey
     */
    public $appkey;

    /**
     * @var string 阿里大于 secretKey
     */
    public $secretKey;

    /**
     * @var string 公共回传参数
     */
    public $extend = null;

    /**
     * @var string 短信签名
     */
    public $signName;

    /**
     * @var string 短信模板ID
     */
    public $templateCode;

    public function init()
    {
        if ($this->appkey === null) {
            throw new InvalidConfigException('The "appkey" property must be set.');
        } elseif ($this->secretKey === null) {
            throw new InvalidConfigException('The "secretKey" property must be set.');
        } elseif ($this->signName === null) {
            throw new InvalidConfigException('The "signName" property must be set.');
        } elseif ($this->templateCode === null) {
            throw new InvalidConfigException('The "templateCode" property must be set.');
        } 
    }
	
	/**
	 * 发送验证码
	 * @return boolean true|false
	 */
	function sendSMS ($mobile, $content){
	    
	    include "TopSdk.php";
	    date_default_timezone_set('Asia/Shanghai');
	   
	    $c = new \TopClient;
		$c ->appkey = $this->appkey ;
		$c ->secretKey = $this->secretKey ;
		$req = new \AlibabaAliqinFcSmsNumSendRequest;
		$req ->setExtend($this->extend);
		$req ->setSmsType( "normal" );
		$req ->setSmsFreeSignName($this->signName);
		$req ->setSmsParam( "{\"name\":\"".$mobile."\",\"code\":\"".$content."\"}" );
		$req ->setRecNum( $mobile );
		$req ->setSmsTemplateCode($this->templateCode);
		$resp = $c ->execute( $req );

		if($resp->result->success){
	        return true;
	    }
	    else{
	        return false;
	    }
	}
}
?>