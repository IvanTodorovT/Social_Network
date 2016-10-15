<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentsController extends Controller
{
    public function getComments($table, $id)
    {
    	echo $table . ' - ' . $id;
    }
}
