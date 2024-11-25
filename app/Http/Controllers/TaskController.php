<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all(); 
        $categories = Category::all();
        // var_dump($tasks);
        // echo "<hr>";
        // var_dump(compact('tasks'));
        return view('tasks.index',compact('tasks','categories'));
    }

    public function store(Request $request) {
        $request -> validate(
            ['name' => 'required|max:8|unique:tasks,name',
            'description' =>'min:5|max:10',
            'category_id'=> 'required|exists:categories,id'],
                ['name.required' => 'el nom de la tasca es obligatori',
                'name.max' => 'Com a max 8 caracters',
                'name.unique' => 'el nom de la tasca ja existeix',
                'description.min ' => 'Min 3 caracters',
                'description.max' => 'max 10 caracters']
        );
 

        Task::create($request->all());
        return redirect('/');

    }

    public function destroy(Task $task) {
        $task->delete();
        return redirect('/');
    }

    public function showCategories() {
        $categories = Category::all();
        return view ('tasks.categories',compact('categories'));
    }


}

