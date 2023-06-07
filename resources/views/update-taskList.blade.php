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
        <form action="{{route('saveUpdatedTask')}}" method="POST" class=" mb-5">
            @csrf
            <div class="m-auto">
                <input type="text" name="updatename" placeholder="Input Your Task Here!" class="border-solid border-2 w-25 p-2 rounded" autocomplete="off"
             value="{{ $task->task_name }}">
                <input type="hidden" name="id" value="{{ $task->id }}">
                @error('updatetask')
                    {{$message}}
                @enderror
                <br>
                <button type="submit" class="w-25 bg-dark text-white rounded">update</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
@endsection()
