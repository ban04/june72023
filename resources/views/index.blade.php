@extends('layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Document</title>
</head>
<body>
    <div class="text-center">
        <h1>To Do List Practice</h1>
        <p>@byAlba</p>
        <div class="mt-5">
            @if($errors->any())
               <div class="col-12">
                   @foreach ($errors->all() as $error)
                       <div class="alert alert-danger">{{$error}}</div>
                   @endforeach
               </div>
           @endif

           @if(Session()->has('error'))
           <div class="alert alert-danger">{{Session('error')}}</div>
           @endif

           @if(Session()->has('success'))
           <div class="alert alert-success w-50 m-auto">{{Session('success')}}</div>
           @endif
       </div>
        <form action="{{route('save-task')}}" class=" mb-5" method="POST">
            @csrf
            <div class="m-auto">
                <input type="text" name="taskname" placeholder="Input Your Task Here!" class="border-solid border-2 w-25 p-2 rounded" autocomplete="off" @required(true)>
                @error('taskname')
                    {{$message}}
                @enderror
                <br>
                <button type="submit" class="w-25 bg-dark text-white rounded">Save</button>
            </div>
        </form>


        <table border="1" class="m-auto w-50">
        <thead>
            <tr class="border border-black-2">
                <th class="border border-black-2">List</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($tasks)
            @foreach ($tasks as $task)
            <tr class="">
                <td class="border w-75">{{$task->task_name}}</td>
                <td class="border">
                    <a href="{{route('updateTask', $task->id)}}">Edit</a>
                    <a href="{{route('deleteTask', $task->id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif

            </tbody>
            </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
@endsection()
