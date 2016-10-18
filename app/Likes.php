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
	
// 	public static function getNumberOfLikes()
// 	{
		
// 	}
	
	public static function getNumbers ($tableName, $refName, $refIDs)
	{
		$onlyNumbers = implode($refIDs);
		if (!preg_match('/\w{1,13}_status$/', $tableName) || 
				!preg_match('/\w{1,7}_id$/', $refName) || 
				$onlyNumbers != floatval($onlyNumbers)){
			return 'Invalid input data';
		}
		$posts = \DB::table($tableName)
					->whereIn($refName, $refIDs)
					->get();
		
		$who = Auth::id();
		$numbers = [];
		foreach ($posts as $post){
			if ($post->status != 'delete'){
				isset($numbers[$post->status][$post->$refName]) ? 
						$numbers[$post->status][$post->$refName]++ : 
						$numbers[$post->status][$post->$refName] = 1;
			}
			if ($post->user_id == $who){
				$numbers['status'][$post->$refName] = $post->status;
			}
		}
		return $numbers;
	}
}