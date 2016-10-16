<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class Comments
{
	// tableName = post_comments
	// refName = post_id
	public static function getComments($table, $tableName, $refName, $refId)
	{
		if (!self::canDo($table, $refName, $refId)){
			return 'You are not allowed to comment this';
		}
		return @\DB::table($tableName)
					->join('users2', 'users2.id', '=', $tableName . '.user_id')
					->select('users2.firstname', 'users2.lastname',
							$tableName . '.id', $tableName . '.comment_text', $tableName . '.created_at')
					->where($refName, $refId)
					->orderBy($tableName . '.created_at', 'desc')->get();
	}
	
	public static function canDo($table, $refName, $refId)
	{// damned tablenames!
		$poster = \DB::table($table . 's')
				->select('user_id')
				->where('id', $refId)->first();
		$poster = (array)$poster;  //one hell of a workaround!
		return in_array(reset($poster), Auth::user()->getFollowersIds());
	}
	
	public static function storeComment ($table, $tableName, $refName, $refId, $text)
	{
		if (!self::canDo($table, $refName, $refId)){
			return null; //null is not ok
		}
		$userId = Auth::id();
		try {
		@\DB::insert('INSERT INTO ' . $tableName . ' (' . $refName . ', user_id, comment_text)
				VALUES (?, ?, ?)', [$refId, $userId, $text]);
		} catch (\Exception $e) {
			return $e::getMessage();
		}
	}
}