<?php
class OrdersAction extends HomeAction{
	
	//微易支付
	public function vyipay(){
		// 判断POST来的数组是否为空
		if(empty($_GET)) {
			return false;
		}
		//验证签名结果
		if($_GET['type'] == 'wxpay' || $_GET['type'] == 'qqpay'){
			$mysign = md5(C("user_pay_appid").$_GET['out_trade_no'].$_GET['trade_status'].C("user_pay_appkey"));
			F('_feifeicms/mysign',$mysign);
			//验证
			if($_GET['sign'] == $mysign){
				//是否支付成功
				if ($_GET['trade_status'] == 'SUCCESS') {
					D("Orders")->ff_update_order($out_trade_no);
				}
				echo 'success';
			} else {
				echo "fail";
			}
		}else{
			//alipay
			$isSign = D('PayVyi')->getSignVeryfy($_GET, $_GET["sign"]);
			//验证成功
			if($isSign) {
				//商户订单号
				$out_trade_no = $_GET['out_trade_no'];
				//微易支付交易号
				$trade_no = $_GET['trade_no'];
				//交易状态
				$trade_status = $_GET['trade_status'];
				//支付方式
				$type = $_GET['type'];
				//是否支付成功
				if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
					D("Orders")->ff_update_order($out_trade_no);
				}
				echo "success";	
			}else{
				echo "fail";
			}
		}
	}
	
	// 瑞捷支付定单通知处理
	public function ruijie(){
		/*同步请求
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			redirect(ff_url('user/center',array('action'=>'order'),true));
			exit();
		}*/
		//异步请求
		$post = array();
		$post['status'] = $_POST['status'];
		$post['customerid'] = $_POST['customerid'];
		$post['sdorderno'] = $_POST['sdorderno'];
		//$post['total_fee'] = (float) $_POST['total_fee'];
		$post['total_fee'] = number_format($_POST['total_fee'],2);
		$post['sdpayno'] = $_POST['sdpayno'];//平台订单号
		$post['paytype'] = $_POST['paytype'];
		$post['remark'] = $_POST['remark'];
		$post['sign'] = $_POST['sign'];
		F('_feifeicms/order',$post);
		//签名
		$mysign = md5('customerid='.$post['customerid'].'&status='.$post['status'].'&sdpayno='.$post['sdpayno'].'&sdorderno='.$post['sdorderno'].'&total_fee='.$post['total_fee'].'&paytype='.$post['paytype'].'&'.C("user_pay_appkey"));
		//验证
		if($post['sign'] == $mysign){
			if($post['status'] == '1'){
				D("Orders")->ff_update_order($post['sdorderno']);
				echo 'success';
			} else {
				echo 'fail';
			}
		} else {
			echo 'signerr';
		}
	}
}
?>