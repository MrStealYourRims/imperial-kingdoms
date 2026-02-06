<?php
	if (!defined('IK_AUTHORIZED'))
	{
		die('Invalid security clearance.');
	}
	
	if (!defined('MYSQL_ASSOC'))
	{
		define('MYSQL_ASSOC', MYSQLI_ASSOC);
	}
	
	if (!defined('MYSQL_NUM'))
	{
		define('MYSQL_NUM', MYSQLI_NUM);
	}
	
	if (!defined('MYSQL_BOTH'))
	{
		define('MYSQL_BOTH', MYSQLI_BOTH);
	}
	
	if (!function_exists('mysql_connect'))
	{
		function mysql_connect($server = null, $username = null, $password = null, $new_link = false, $client_flags = 0)
		{
			$link = mysqli_connect($server, $username, $password, '', 0, null, $client_flags);
			if ($link)
			{
				$GLOBALS['mysql_link'] = $link;
			}
			
			return $link;
		}
	}
	
	if (!function_exists('mysql_select_db'))
	{
		function mysql_select_db($database_name, $link_identifier = null)
		{
			$link = $link_identifier ?: ($GLOBALS['mysql_link'] ?? null);
			if (!$link)
			{
				return false;
			}
			
			return mysqli_select_db($link, $database_name);
		}
	}
	
	if (!function_exists('mysql_query'))
	{
		function mysql_query($query, $link_identifier = null)
		{
			$link = $link_identifier ?: ($GLOBALS['mysql_link'] ?? null);
			if (!$link)
			{
				return false;
			}
			
			return mysqli_query($link, $query);
		}
	}
	
	if (!function_exists('mysql_fetch_array'))
	{
		function mysql_fetch_array($result, $result_type = MYSQL_BOTH)
		{
			if (!$result)
			{
				return false;
			}
			
			$mapped_type = $result_type;
			if ($result_type === MYSQL_ASSOC)
			{
				$mapped_type = MYSQLI_ASSOC;
			}
			elseif ($result_type === MYSQL_NUM)
			{
				$mapped_type = MYSQLI_NUM;
			}
			elseif ($result_type === MYSQL_BOTH)
			{
				$mapped_type = MYSQLI_BOTH;
			}
			
			return mysqli_fetch_array($result, $mapped_type);
		}
	}
	
	if (!function_exists('mysql_num_rows'))
	{
		function mysql_num_rows($result)
		{
			if (!$result)
			{
				return 0;
			}
			
			return mysqli_num_rows($result);
		}
	}
	
	if (!function_exists('mysql_real_escape_string'))
	{
		function mysql_real_escape_string($unescaped_string, $link_identifier = null)
		{
			$link = $link_identifier ?: ($GLOBALS['mysql_link'] ?? null);
			if (!$link)
			{
				return addslashes($unescaped_string);
			}
			
			return mysqli_real_escape_string($link, $unescaped_string);
		}
	}
	
	if (!function_exists('mysql_insert_id'))
	{
		function mysql_insert_id($link_identifier = null)
		{
			$link = $link_identifier ?: ($GLOBALS['mysql_link'] ?? null);
			if (!$link)
			{
				return 0;
			}
			
			return mysqli_insert_id($link);
		}
	}
	
	if (!function_exists('mysql_affected_rows'))
	{
		function mysql_affected_rows($link_identifier = null)
		{
			$link = $link_identifier ?: ($GLOBALS['mysql_link'] ?? null);
			if (!$link)
			{
				return -1;
			}
			
			return mysqli_affected_rows($link);
		}
	}
	
	if (!function_exists('mysql_error'))
	{
		function mysql_error($link_identifier = null)
		{
			$link = $link_identifier ?: ($GLOBALS['mysql_link'] ?? null);
			if (!$link)
			{
				return '';
			}
			
			return mysqli_error($link);
		}
	}
	
	if (!function_exists('mysql_errno'))
	{
		function mysql_errno($link_identifier = null)
		{
			$link = $link_identifier ?: ($GLOBALS['mysql_link'] ?? null);
			if (!$link)
			{
				return 0;
			}
			
			return mysqli_errno($link);
		}
	}
?>
