<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Create todo
    public function create(Request $request)
    {
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->status = $request->status;
        $todo->save();

        return response()->json([
            "status" => "success",
            "message" => "Todo created successfully"
        ], 201);
    }

    // Get todo list
    public function list()
    {
        $todos = Todo::all()->toArray();
        return array_reverse($todos);
    }

    // Get todo by id
    public function get($id)
    {
        $todo = Todo::find($id);
        return response()->json($todo);
    }

    // Update todo by id
    public function update($id, Request $request)
    {
        $todo = Todo::find($id);
        $todo->update($request->all());

        return response()->json([
            "status" => "success",
            "message" => "Todo updated successfully"
        ], 200);
    }

    // Delete todo by id
    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json([
            "status" => "success",
            "message" => "Todo deleted successfully"
        ], 200);
    }

    // Search todo by title
    public function search($title)
    {
        $todo = Todo::where('title', 'like', '%' . $title . '%')->get();
        return response()->json($todo);
    }

    // Search todo by status
    public function searchStatus($status)
    {
        $todo = Todo::where('status', 'like', '%' . $status . '%')->get();
        return response()->json($todo);
    }
}
