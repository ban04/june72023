<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManagerController extends Controller
{

    public $task;
    function __construct()
    {
        $this->task = new Task();
    }

    function index(){
        $tasks = $this->task->getAllList();
        return view('index', compact('tasks'));
    }
    function view(){
        return view('welcome');
    }

    function login(){
        if(Auth::check()){
        return redirect(route('home'));

        }
        return view('login');
    }

    function registration(){
        if(Auth::check()){
            return redirect(route('home'));

            }
        return view('registration');
    }



    function registrationPost(Request $request){
        $request->validate([
            'name'=> 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with('error', 'Registration failed, try again.');
        }
        return redirect(route('login'))->with('success', 'Registration success, Login to access the app');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
            return redirect(route('login'))->with("error", "Login details are not valid");

    }

    function logout(){
        Session::flush();
        Auth::logout();

        return redirect(route(('login')));
    }

    //To do list configuration

    function saveTask(Request $request){
        $data = [
            'task_name' => $request->taskname
        ];

        $this->task->saveTask($data);
        return back()->with('success', 'Task Saved Successfully');
    }

    function deleteTask($id){
        $this->task->deleteTask($id);
        return back();
    }

    function updateTask($id){
        $task = $this->task->getTask($id);
        return view('update-taskList', compact('task'));
    }

    function saveUpdatedTask(Request $request){
        $data = [
            'task_name' => $request->updatename
        ];

        $this->task->saveUpdatedTask($data, $request->id);
        return redirect()->route('index');
    }

    function TaskList(){
        return view('update-taskList');
    }
}
