<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ValidationPost;



class TaskController extends Controller
{

    public function index (){

        // $tasks=Task::all();
        // $com = Task::count();

        $tasks=Task::orderBy('created_at')->get();
        return view('tasks.index',compact('tasks'));
        
        // ! $tasks=App\Task::all();
        // In the above query doesn't work with me > $tasks=App\Task::all(); the result the that tell me class(Task) not found
        
    }

    public function show ($id){ 

        /** 
         *findorFail() method If the exception is not caught , 
         *a 404 HTTP response is automatically sent back to the user.
         */
        
        $task =Task::findOrFail($id);
        return view ('tasks.show',compact('task'));

        //! $task =Task::where('id',$id)->get();
           /** 
            * In the above query doesn't work with me which you told us with the record >  $task =Task::where('id',$id)->get();  
            * I read documentation of eloquent and see that method get() doesn't work with single field , 
            * method that works with Retrieving Single Models / Aggregatesis is  (find ,first,firstWhere)
            */
                
    }  

    public function store (ValidationPost $request){

        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return redirect('tasks')->with('status', 'Tasks added Successfuly!');

    } 

    public function destroy ($id){

        $task = Task::find($id);
        $task->delete();
        return redirect('tasks');
        
    }

    public function ShowEditTask($id){

        $tasks =Task::all(); 
        $task_edit =Task::findOrFail($id);
        return view('tasks.index',compact('task_edit','tasks')); 

    }   

    public function Update(Request $request,$id){     

        // Task::where('id', $id)->update(['name' => $request->name]);
        // or
        $task = Task::find($id);
        $task->name = $request->name; 
        $task->save();
        return redirect('tasks')->with('status', 'Tasks Updated Successfuly!'); 
        
    }

}


        /** Failed Test 1
         * use Illuminate\Validation\Validator;
         * $validator = Validator::make($request->all(), [
         * 'NameToStore' => 'required|alpha_num|min:5|max:255',
         * ]);
         * if ($validator->fails()) {
         * return redirect('tasks')
         * ->withErrors($validator)
         * ->withInput();
         * }
         */

         