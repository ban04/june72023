@extends('layout')
@section('title', 'Login')
@section('content')
    <div class="container">
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
           <div class="alert alert-success">{{Session('success')}}</div>
           @endif
       </div>




        <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto mt-3 w-50">
            @csrf

            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control" placeholder="Enter your email here!" name="email">
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" placeholder="Enter your password here!" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('registration')}}" class="btn btn-primary">Register</a>
          </form>
    </div>
@endsection
