<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Details</title>
</head>
<body>
    
    <table class="table table-striped task-table" style="width:19cm">
        <thead>
           <h1>Task</h1>
           <hr>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </thead>
        
        <tbody>

                <tr>
                   <td class="table-text">

                    <!-- Task ID --> 
                    <h2>ID</h2>
                    <h2>{{$task->id}}</h2>                    
                   </td>    

                   <!-- Task NAME --> 
                   <td>                    
                    <h2>NAME</h2>
                    <h2>{{$task->name}}</h2>                                           
                   </td>
                   
                   <!--Created_at Task -->
                   <td>           
                    <h2>Created_at</h2>
                    <h2>{{$task->created_at}}</h2>                            
                   </td> 

                   <!--Updated_at Task -->
                   <td>
                    <h2>Updated_at</h2>
                    <h2>{{$task->updated_at}}</h2>         
                   </td>       
                   
                </tr>
                
       
        </tbody>
    </table>

</body>
</html>