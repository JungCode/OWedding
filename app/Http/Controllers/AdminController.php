<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Fiance;
use App\Models\Task;
use App\Models\Template;
use App\Models\UserWeb;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        // Lấy danh sách các mục từ cơ sở dữ liệu
        $users = User::where('role','<>','admin')->get();
        // Trả về view hiển thị danh sách các mục
        return view('admin.index', ['users' => $users]);
    }

    public function search(Request $request)
    {
        $searchText = $request->search;
        $users = User::where('name', 'LIKE', "%$searchText%")->where('role','<>','admin')->get();
        return view('admin.index',compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200'],
            'retype_password' => ['required', 'same:password']
        ]);
    
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->email_verified_at = null;
        $user->password = bcrypt($data['password']);
        $user->current_budget = 0;
        $user->remember_token = Str::random(10);
        $user->save();
    
        return redirect()->route('admin.index')->with('success', 'User created successfully');
    }
 
    // public function show(){
    // }

    public function edit($id)
    {
        
            $user = User::findOrFail($id);

        return view('admin.edit', compact('user'));
    }
    

public function update(Request $request)
{
    // Cập nhật thông tin người dùng dựa trên dữ liệu từ form
//    $data = $request->validate([
//     'id'=>'required',
//     'name'=>'required',
//     'email'=>'required',
//     'google_id'=>'required',
//     'facebook_id'=>'required',
//     'first_name'=>'required',
//     'last_name'=>'required',
//     'birthday'=>'required',
//     'address'=>'required',
//     'phone_number'=>'required',
//    ]);

   $user = User::findOrFail($request->input('id'));

   $user->name = $request->input('name');
   $user->email = $request->input('email');
   $user->google_id = $request->input('google_id');
   $user->facebook_id = $request->input('facebook_id');
   $user->first_name = $request->input('first_name');
   $user->last_name = $request->input('last_name');
   $user->birthday = $request->input('birthday');
   $user->address = $request->input('address');
   $user->phone_number = $request->input('phone_number');
   $user->save();
    // Chuyển hướng trở lại trang danh sách người dùng
    return redirect()->route('admin.index')->with('success','Updating User Information Successfully!');
}
    public function destroy(User $admin)
    {
        // Xóa người dùng

        $admin->delete();

        // Chuyển hướng trở lại trang danh sách người dùng
        return redirect()->route('admin.index') ->with('success', 'User deleted successfully');
    }
    

    public function showlogin(){

    }

    public function login(){

    }
    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('users.index');
    }
    public function fiance_index()
    {
        // Lấy danh sách các mục từ cơ sở dữ liệu
        $fiances = Fiance::get()->all();

        // Trả về view hiển thị danh sách các mục
        return view('admin.fiance_index', ['fiances' => $fiances]);
    }
    public function fiance_search(Request $request)
    {
        $searchText = $request->search;
        $fiances = Fiance::where('full_name', 'LIKE', "%$searchText%")->get();
        return view('admin.fiance_index',compact('fiances'));
    }
    public function template_index()
    {
        // Lấy danh sách các mục từ cơ sở dữ liệu
        $templates = Template::get()->all();

        // Trả về view hiển thị danh sách các mục
        return view('admin.templates', ['templates' => $templates]);
    }
    public function template_search(Request $request)
    {
        $searchText = $request->search;
        $templates = Template::where('name', 'LIKE', "%$searchText%")->get();
        return view('admin.fiance_index',compact('templates'));
    }
    
}
        


