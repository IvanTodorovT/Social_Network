<?php

namespace App;

use function League\Flysystem\update;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class Comments
{
	// tableName = post_comments
	// refName = post_id
	public static function getComments($table, $tableName, $refName, $refId)
	{
		if (!self::canDo()){
			return 'You are not allowed to comment this';
		}
		return @\DB::table($tableName)
					->join('users2', 'users2.id', '=', $tableName . '.user_id')
					->select('users2.firstname', 'users2.lastname',
							$tableName . '.id', $tableName . '.comment_text', $tableName . '.created_at')
					->where($refName, $refId)
					->orderBy($tableName . '.created_at', 'desc')->get();
	}
	
	public static function canDo()
	{
		\DB::table()
		return true; //validation required
	}
	
	public static function storeComment ($table, $tableName, $refName, $refId, $text)
	{
		if (!self::canDo()){
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