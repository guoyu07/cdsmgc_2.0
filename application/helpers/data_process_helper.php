<?php
//data_processing_before_database()
//数据在存入数据库之前先处理
function dpbd($param)
{
	if($param)
	{
		if(get_magic_quotes_gpc())
		{
			if(is_array($param))
			{
				foreach ($param as $key => $value) 
				{
					$param[$key] = htmlspecialchars(trim($value));
				//	echo $param[$key].'<hr>';
				}
			}else {
				$param = trim($param);
				$param = htmlspecialchars($param);
			}
			return $param;
		}else {
			return $param;
		}
	}else {
		return FALSE;
	}
}
?>