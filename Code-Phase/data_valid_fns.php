<?php
	function filled_out($form_vars)
	{
		foreach ($form_vars as $key => $value)
		{
			if ((!isset($key)) || ($value == ''))
			{
					return false;
			}
		}
		return true;
	}
	function valid_email($address)
	{
		// check an email address is possibly valid
		if (ereg('^[a-zA-Z0-9_\.\-]+@(st\.)?niituniversity\.in+$', $address))
		{
			return true;
		}else
		{
			return false;
		}
	}
?>
