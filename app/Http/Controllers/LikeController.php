<?php

namespace App\Http\Controllers;

use App\Likes;

class LikeController extends Controller
{
// 	public function getButtons()
// 	{
// 		return view('Modules.likeButtons');
// 	}
	
    public function like()
    {
    	$userId = \Auth::id();
    	if(!$userId){
    		return 'You are not logged in';
    	}
    	$table = empty($_GET['table']) ? NULL : $_GET['table'];
    	$status = empty($_GET['status']) ? NULL : $_GET['status'];
    	$refId = empty($_GET['refId']) ? NULL : $_GET['refId'];
 		
    	if(!$table || !$refId) { return 'Nothing to like';}
    	$statuses = ['like', 'dislike'];   	
    	if (!in_array($status, $statuses)){
    		return 'You can only: ' . implode(', ', $statuses);
    	}
    	$tableName = $table . '_status';
    	$refName = strstr($table, 'comment') ? 'comment_id' : $table . '_id';
    	
    	$existant = Likes::checkStatus($tableName, $refName, $refId);
    	$err = '';
    	if ($existant){
    		if ($existant == $status){
	    		$status = 'delete'; //just a placeholder
	    	} 
    		$err = Likes::update($tableName, $refName, $refId, $status);
    	} else {
    		$err = Likes::insert($tableName, $refName, $refId, $status);
    	}
    	
    	return $err ? $err : $status . 'd';
    }

}
