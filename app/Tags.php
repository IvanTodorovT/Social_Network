<?php

namespace App;

class Tags
{
	public static function getTags()
	{
		return \DB::table('post_tag')->pluck('name')->toArray();
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
	
	public static function getMatches($tags)
	{
		/**
		 * Където логнатият е във friend-овете на $poster и някой от tag-вете е м-у Таговете
		 * user info, comment info + tag info
		 */
		return @\DB::table('posts')
				->leftJoin('users_friends', 'posts.user_id', '=', 'users_friends.user_id')
				->join('users2', 'posts.user_id', '=', 'users2.id')
				->leftJoin('albums', 'posts.album_id', '=', 'albums.id')
				->select('users2.firstname', 'users2.lastname', 'users2.profile_pic as avatar',
						'posts.id', 'posts.user_id', 'posts.text', 'posts.created_at',
						'posts.photo', 'posts.tag1','posts.tag2','posts.tag3',
						'albums.id as albumId', 'albums.name as albumName')
				->whereIn('posts.tag1', $tags, 'or')
				->whereIn('posts.tag2', $tags, 'or')
				->whereIn('posts.tag3', $tags, 'or')
				->where('users_friends.friend_id', \Auth::id())
				->distinct()
				->get()
				->toArray();
	}
}