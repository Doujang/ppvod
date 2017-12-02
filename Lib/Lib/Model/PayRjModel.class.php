<?php
class PayRjModel extends Model {
	//瑞捷云支付19kf
	public function submit($user_id,$post){
		$data = array();
		$data['version'] = '1.0';
		$data['customerid'] = trim(C("user_pay_appid"));
		$data['sdorderno'] = date("YmdHis").mt_rand(10000, 99999);
		$data['total_fee'] = number_format($post['score_ext'],2);
		$data['notifyurl'] = 'http://'.C("site_domain").C("site_path").'index.php?g=home&m=orders&a=ruijie';
		$data['returnurl'] = 'http://'.C("site_domain").C("site_path").'notify.php';
		$data['remark'] = '积分充值（'.$user_id.'）';
		$data['sign'] = md5('version='.$data['version'].'&customerid='.$data['customerid'].'&total_fee='.$data['total_fee'].'&sdorderno='.$data['sdorderno'].'&notifyurl='.$data['notifyurl'].'&returnurl='.$data['returnurl'].'&'.C("user_pay_appkey"));
		//写入订单
		D("Orders")->ff_update(array(
			'order_sign'=>$data['sdorderno'],
			'order_status'=>0,
			'order_uid'=>$user_id,
			'order_gid'=>1,
			'order_money'=>$data['total_fee'],
			'order_ispay'=>1,
			'order_shipping'=>0,
			'order_info'=>$data['remark']
		));
		return $this->buildRequestForm($data);
		//return $data;
	}
	
	public function buildRequestForm($para, $method='POST', $button_name='正在跳转') {
		$sHtml = "<form id='pay' name='pay' action='http://www.19fk.com/checkout' method='".$method."'>";
		while (list ($key, $val) = each ($para)) {
			$sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
		}
		//submit按钮控件请不要含有name属性
    $sHtml = $sHtml."<input type='submit' value='".$button_name."'></form>";
		$sHtml = $sHtml."<script>document.forms['pay'].submit();</script>";
		return $sHtml;
	}
}
?>