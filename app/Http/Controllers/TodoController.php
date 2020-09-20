<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Repositories\Todo\TodoInterface;
use Illuminate\Support\Facades\Validator;

class TodoController extends BaseController
{
    private $todo;

    public function __construct(TodoInterface $todo){
        $this->todo = $todo;
    }

    public function index()
    {
        return $this->sendResponse($this->todo->getAll(), 'Retrived All TODOs');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:todos|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Data Validation Failed!', $validator->errors());
        } else {
            return $this->sendResponse($this->todo->create(['title' => $request->title, 'user_id' => 1, 'isCompleted' => 0]), 'TODO Created', 203);
        }
    }

    public function show($id)
    {
        return $this->sendResponse($this->todo->getById($id), 'TODO Retrived by id');
    }

    public function edit($id)
    {
        //
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'isCompleted' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Data Validation Failed!', $validator->errors());
        } else {
            return $this->sendResponse($this->todo->update($id, ['title' => $request->title,  'isCompleted' => $request->isCompleted]), 'TODO Updated', 200);
        }
    }

    public function destroy($id)
    {
        return $this->sendResponse($this->todo->delete($id), 'TODO deleted');
    }
}
