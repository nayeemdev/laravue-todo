<?php

namespace App\Http\Controllers;

use App\Repositories\Todo\TodoInterface;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    public function __construct(TodoInterface $todo){
        $this->todo = $todo;
    }
}
