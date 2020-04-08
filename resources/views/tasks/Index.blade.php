@extends('layouts.app')
@section('title', 'Task List')

@section('content')
<div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            New Task
        </div>

        <div class="panel-body">

            {{-- Display status of work --}}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

            {{-- Display errors  --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
             @endif



            @if (isset($task_edit))
            
                <form action="{{url('update/'.$task_edit->id)}}" method="POST" class="form-horizontal">        
                    @csrf
                    @method('PATCH')
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value={{$task_edit->name}} required>

                        </div>
                    </div>

                    <!-- Update Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-pencil fa-fw"></i> Update Task
                            </button>
                        </div>
                    </div>
                </form>

            @else
            
                 
            <!-- New Task Form -->
                <form action="{{url('store')}}" method="POST" class="form-horizontal">
                    @csrf
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6"> 
                            <input type="text" name="name" id="task-name" class="form-control" value="" required >
                        </div>
                    </div>
                    


                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <!-- Current Tasks -->
        {{-- To check if database is empty using count, or use ( $com > 0 ) that we sent from index function
                    sum, max, and other aggregate methods provided by the query builder. --}} 
    @if (count($tasks) ?? '' > 0)                  
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>

                        @foreach ($tasks as $task)

                            <tr>
                               <td class="table-text">
                                   <div><a href="task/{{$task->id}}" >{{$task->name ?? ''}}</a></div>
                               </td>

                               <td>&nbsp;</td>

                               <!-- Task Delete Button --> 
                               <td>
                                 <form action="{{url('delete/'.$task->id)}}" method="POST">
                                         @csrf
                                         @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                             <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                 </form>                                 
                               </td>

                               <td>&nbsp;</td>

                               <!-- Task Update Button -->
                              <td>
                                    {{--   Note :
                                         I wrote the action with url in this way to can avoid error  http://127.0.0.1:8000/edit/edit/51
                                         when double click or click another edit button ,benifits can we switch between update tasks 
                                     --}}
                                 <form action="{{url('edit/'.$task->id)}}" method="POST">
                                         @csrf
                                         @method('PUT')
                                        <button type="submit" class="btn btn-success">
                                             <i class="fa fa-pencil fa-fw"></i> Edit
                                        </button>
                                </form>                                  
                              </td>

                            </tr>
                      
                        @endforeach
                            
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
    
@endsection

