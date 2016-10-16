<?php

namespace App\Http\Controllers;

use App\Comments;

class CommentsController extends Controller
{
    public function getComments($table, $id)
    {
    	if(substr($table, -1) == 's'){
    		$table = substr($table, 0, -1);
    	}
    	extract($this->dealingWithBadArchitecture($table));
    	
    	$array = Comments::getComments($tableName, $refName, $id);
    	return view('Modules.comments', ['commentsArray' => $array]);
    }
    
    public function submitComment($table, $id)
    {
    	$text = empty($_POST['text']) ? '' : $_POST['text'];
    	if (!$text){
    		return 'Can\'t submit an empty comment';
    	}
    	extract($this->dealingWithBadArchitecture($table));
    	
    	$err = Comments::storeComment($tableName, $refName, $id, $text);
    	return $err ? $err : '';
    }
    
    private function dealingWithBadArchitecture($table)
    {
    	$tableName = $table . '_comments';
    	$refName = $table . '_id';
    	return ['tableName' => $tableName, 'refName' => $refName];
    }
}
