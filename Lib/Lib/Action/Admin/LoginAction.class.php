<?php
class LoginAction extends Action{
    //默认操作
    public function index(){
		if (!$_SESSION['AdminLogin']) {
			header("Content-Type:text/html; charset=utf-8");
			echo('请从后台管理入口登录。');
			exit();
		}
		if ($_SESSION[C('USER_AUTH_KEY')]) {
			redirect("?s=Admin-Index");
		}
		$this->display('./Public/system/login.html');
    }
	//登陆检测_前置
	public function _before_check(){
	    if (empty($_POST['user_name'])) {
			$this->error(L('login_username_check'));
		}
		if (empty($_POST['user_pwd'])) {
			$this->error(L('login_password_check'));
		}			
	}
	//登陆检测
    public function check(){
        $where = array();
		$where['admin_name'] = trim($_POST['user_name']);
		$rs = D("Admin.Admin");
		$list = $rs->where($where)->find();
        if (NULL == $list) {
            $this->error(L('login_username_not'));
        }
		if ($list['admin_pwd'] != md5($_POST['user_pwd'])) {
			$this->error(L('login_password_not'));
		}
		// 缓存访问权限
		$_SESSION[C('USER_AUTH_KEY')] = $list['admin_id'];
		$_SESSION['admin_name'] = $list['admin_name'];
		$_SESSION['admin_ok'] = $list['admin_ok'];
		//更新用户登陆信息
		$data = array();
		$data['admin_id'] = $list['admin_id'];
		$data['admin_logintime'] = time();
		$data['admin_count'] = array('exp','admin_count+1');
		$data['admin_ip'] = get_client_ip();
		$rs->save($data);					
		redirect('?s=Admin-Index');
    }
	// 用户登出
    public function logout(){
        if (isset($_SESSION[C('USER_AUTH_KEY')])) {
			unset($_SESSION);
			session_destroy();
        }
		$this->assign("jumpUrl", '?s=Admin-Login-logout_Index');//用于跳转的地址
		$this->success('恭喜您，注销成功');//用于跳转,调用跳转地址跳转页面
	//	$this->display('./Public/system/login.html');
    }
	// 用户登出
	public function logout_Index(){
		if (isset($_SESSION[C('USER_AUTH_KEY')])) {
			unset($_SESSION);
			session_destroy();
		}
//		header("Content-Type:text/html; charset=utf-8");
//		echo ('您已经退出网站管理后台，如需操作请重新登录！');

		$this->display('./Public/system/login.html');

	}

}
?>