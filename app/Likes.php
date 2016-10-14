<?php

namespace App;

use function League\Flysystem\update;
use Illuminate\Support\Facades\Auth;

class Likes
{
	public static function checkStatus($tableName, $refName, $refId)
	{
		$userId = Auth::id();
		if (!$userId){return 'error';}
		return @\DB::table($tableName)->where([
				[$refName, $refId],
				['user_id', $userId]
		])->pluck('status')->first();
	}
	
	public static function insert ($tableName, $refName, $refId, $status)
	{
		$userId = Auth::id();
		if (!$userId){return 'error';}
		@\DB::insert('INSERT INTO ' . $tableName . ' (' . $refName . ', user_id, status)
				VALUES (?, ?, ?)', [$refId, $userId, $status]);
	}
	
	public static function update ($tableName, $refName, $refId, $status)
	{
		$userId = Auth::id();
		if (!$userId){return 'error';}
		@\DB::table($tableName)->where([
				[$refName, $refId],
				['user_id', $userId]
		])->update(['status' => $status]);
	}
}