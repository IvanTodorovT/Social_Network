<?php

namespace App\Http\Controllers;

use App\Likes;

class LikeController extends Controller
{
	/**
	 * for this to work i need: 
	 * type - post/album....
	 * status - like/dislike...
	 */
    public function like()
    {
//     	$userId = Auth::id();
//     	if(!$userId){
//     		return 'You are not logged in';
//     	}
    	$table = 'post';//empty($_POST['table']) ? NULL : $_POST['table'];
    	$status = 'dislike';//empty($_POST['status']) ? NULL : $_POST['status'];
    	$refId = 1;//empty($_POST['refId']) ? NULL : $_POST['refId'];
 		
    	if(!$table || !$refId) { return 'Nothing to like';}
    	$statuses = ['like', 'dislike'];   	
    	if (!in_array($status, $statuses)){
    		return 'You can only: ' . implode(', ', $statuses);
    	}
    	$tableName = $table . '_status';
    	$refName = $table . '_id';
    	
    	$existant = Likes::checkStatus($tableName, $refName, $refId);
    	$err = '';
    	if ($existant == $status){
    		$status = 'deleted';
    	} 
    	if ($existant){
    		$err = Likes::update($tableName, $refName, $refId, $status);
    	} else {
    		$err = Likes::insert($tableName, $refName, $refId, $status);
    	}
    	
    	return $err ? $err : 'Thank you for your contribution';
    }

}
