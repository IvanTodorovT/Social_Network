<?php

namespace App;

use Illuminate\Support\Facades\Auth;

class Comments
{
	// tableName = post_comments
	// refName = post_id
	public static function getComments($table, $tableName, $refName, $refId)
	{
		if (!self::canSee($table, $refName, $refId)){
			return 'You are not allowed to see the comments';
		}
		return @\DB::table($tableName)
					->join('users2', 'users2.id', '=', $tableName . '.user_id')
					->select('users2.firstname', 'users2.lastname',
							$tableName . '.id', $tableName . '.comment_text', $tableName . '.created_at')
					->where($refName, $refId)
					->orderBy($tableName . '.created_at', 'desc')->get()->toArray();
	}
	
	public static function getCommentsCount($tableName, $refName, $refIDs)
	{
		$posts = @\DB::table($tableName)
					->select($refName)
					->whereIn($refName, $refIDs)
					->get()
					->toArray();
		
		$commentsCount = [];
		foreach ($posts as $post)
		{
			isset($commentsCount[$post->post_id]) ?
					$commentsCount[$post->post_id]++ : 
					$commentsCount[$post->post_id] = 1;
		}
		return $commentsCount;
	}
	
	public static function canComment($table, $refName, $refId)
	{// damned tablenames!
		$poster = \DB::table($table . 's')
				->select('user_id')
				->where('id', $refId)->first();
		$poster = (array)$poster;  //one hell of a workaround!
		return in_array(reset($poster), Auth::user()->getFollowersIds());
	}	
	
	public static function canSee($table, $refName, $refId)
	{
		$poster = \DB::table($table . 's')
				->select('user_id')
				->where('id', $refId)->first();
		$poster = (array)$poster; 
		
		$followers_ids = \DB::table('users_friends')
				->distinct('friend_id')
				->where('user_id',reset($poster))
				->pluck('friend_id')->toArray();
		return in_array(Auth::id(), $followers_ids);
	}
	
	public static function storeComment ($table, $tableName, $refName, $refId, $text)
	{
		if (!self::canComment($table, $refName, $refId)){
			return 'You are not allowed to comment this';
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