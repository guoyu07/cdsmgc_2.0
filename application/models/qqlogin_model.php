<?php
    class Qqlogin_model extends CI_Model
    {
    	//申请到的appid
    	private $appid = '100248359';		
		
		//申请到的appkey
		private $appkey   = 'b5f87ed54f1e606f738db824e7049df2'; 		

		//QQ登录成功后跳转的地址,请确保地址真实可用，否则会导致登录失败。
	//	private $callback = 'http://cdsmgc.sinaapp.com//qqlogin/oauth/qq_callback.php';

		//QQ授权api接口.按需调用
		private $scope = 'get_user_info,add_share,list_album,add_album,upload_pic,add_topic,add_one_blog,add_weibo';
    	
    	private $user_table = 'e_user';
    	public function __construct()
		{
			parent::__construct();
			$this->load->model('Database_model');
		}
		
		public function qq_login()
		{
			$_SESSION['state'] = md5(uniqid(rand(), TRUE));
    		$login_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=" 
        	. $this->appid . "&redirect_uri=" . urlencode(site_url('login/qq_callback'))
        	. "&state=" . $_SESSION['state']
        	. "&scope=".$this->scope;
    		header("Location:$login_url");
		}
		
		public function qq_callback()
		{
    		if($_REQUEST['state'] == $_SESSION['state']) //csrf
    		{
        		$token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&"
            	. "client_id=" . $this->appid . "&redirect_uri=" . urlencode(site_url('login/qq_callback'))
            	. "&client_secret=" . $this->appkey . "&code=" . $_REQUEST["code"];
				$response = $this->get_url_contents($token_url);
        		if (strpos($response, "callback") !== false)
        		{
            		$lpos = strpos($response, "(");
            		$rpos = strrpos($response, ")");
            		$response  = substr($response, $lpos + 1, $rpos - $lpos -1);
            		$msg = json_decode($response);
            		if (isset($msg->error))
            		{
                		echo "<h3>error:</h3>" . $msg->error;
                		echo "<h3>msg  :</h3>" . $msg->error_description;
                		exit;
            		}
        		}
        		$params = array();
        		parse_str($response, $params);
				$_SESSION['access_token'] = $params["access_token"];
    		}else {
        		echo("The state does not match. You may be a victim of CSRF.");
    		}
    		$this->get_openid();
			$this->get_user_info();
			return $this->save_openid_access_token();
		}

		private function get_openid()
		{
    		$graph_url = "https://graph.qq.com/oauth2.0/me?access_token=" 
        	. $_SESSION['access_token'];
    		$str  = $this->get_url_contents($graph_url);
    		if (strpos($str, "callback") !== false)
    		{
        		$lpos = strpos($str, "(");
        		$rpos = strrpos($str, ")");
        		$str  = substr($str, $lpos + 1, $rpos - $lpos -1);
    		}
    		$user = json_decode($str);
    		if (isset($user->error))
    		{
        		echo "<h3>error:</h3>" . $user->error;
        		echo "<h3>msg  :</h3>" . $user->error_description;
        		exit;
    		}
			$_SESSION['openid'] = $user->openid;
		}

		public function get_user_info($open_id = '')
		{
			if(empty($open_id))
			{
				$open_id = $_SESSION['openid'];
			}
    		$get_user_info = "https://graph.qq.com/user/get_user_info?"
        	. "access_token=" . $_SESSION['access_token']
        	. "&oauth_consumer_key=" . $this->appid
        	. "&openid=" . $open_id
        	. "&format=json";
    		$info = $this->get_url_contents($get_user_info);
    		$arr = json_decode($info, true);
			$_SESSION['userinfo'] = $arr;
		}
		
		private function do_post($url, $data)
		{
    		$ch = curl_init();
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
    		curl_setopt($ch, CURLOPT_POST, TRUE); 
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
    		curl_setopt($ch, CURLOPT_URL, $url);
    		$ret = curl_exec($ch);
    		curl_close($ch);
    		return $ret;
		}

		private function get_url_contents($url)
		{
    		if (ini_get("allow_url_fopen") == "1")
        		return file_get_contents($url);
    		$ch = curl_init();
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    		curl_setopt($ch, CURLOPT_URL, $url);
    		$result =  curl_exec($ch);
    		curl_close($ch);
    		return $result;
		}
		
		private function save_openid_access_token()
		{
			$result = $this->db->where('open_id',$_SESSION['openid'])->get($this->user_table);
			if($result->num_rows() > 0)
			{
				//以前登陆过
				$row = $result->row_array();
				if($row['expiration_time'] > mktime())		//判断是否过期
				{
					$param = array(
						'last_time'		=>	mktime(),
						'login_number'	=>	$row['login_number']+1
					);
				}else {
					$param = array(
						'last_time'		=>	mktime(),
						'login_number'	=>	$row['login_number']+1,
						'access_token'		=>	$_SESSION['access_token'],
						'expiration_time'	=>	strtotime('3 month')
					);
				}		
				return $this->Database_model->update($this->user_table, $row['id'], $param);
				
			}else {
				//第一次登录
				$param = array(
					'open_id'			=>	$_SESSION['openid'],
					'first_time'		=>	mktime(),	
					'last_time'			=>	mktime(),
					'login_number'		=>	1,
					'access_token'		=>	$_SESSION['access_token'],
					'expiration_time'	=>	strtotime('3 month')	//3个月过后的unix时间戳
				);
				return $this->Database_model->insert($this->user_table, $param);
			}   
		}
    }
?>