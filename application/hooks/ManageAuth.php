<?php 
class ManageAuth {               
	/**     * 权限认证     */    
	public function auth() 
	{	          
		if ( preg_match("/admin.*/i", uri_string())) 
		{		
			if(!(isset($_SESSION['admin_is_login'])))
			{
			//	print_r($_SESSION); 
				redirect('login');
			}                             	        
		}            
	}        
}

?>