<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::lastest()->get();
        return response()->json(['Todo fetch successfully', TodoResource::collection($todos)]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=> 'required string max:255',
            'desc'=> 'string nullable',
        ]);
        //
        if ($validator->fails()){
            return response()->json($validator->errors());
        }

        $todo = Todo::create([
            'title' => $request->title,
            'desc' => $request->desc
        ]);
        return response()->json(['Todo created successfully',new TodoResource($todo)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
