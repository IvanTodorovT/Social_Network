<?php

namespace App;

class Tags
{
	public static function getTags()
	{
		return \DB::table('post_tag')->pluck('name');
	}
}