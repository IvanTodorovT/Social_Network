<?php

namespace App;

class Tags
{
	public static function getTags()
	{
		return \DB::table('post_tag')->pluck('name');
	}
	
	public static function getDropDownOptions()
	{
		$tags = self::getTags();
		$options = '<option value=\'NULL\'>---</option>';
		foreach ($tags as $no => $tag){
			$options .= '<option value=\'' . ($no + 1) . "'>" . $tag . '</option>';
		}
		return $options;
	}
}