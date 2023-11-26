<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\UserWeb;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource (Profile).
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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
        $request->session()->put('user', $user);

        auth()->login($user);

        return redirect()->route('landing');
    }

    /**
     * Display the specified resource(này nếu làm admin chắc mới dùng).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource(chỉnh profile).
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'firstName' => 'max:255',
            'lastName' => 'max:255',
        ]);
        $user = User::findOrFail($id);
        $imageUrl = $this->storeImage($request,$id);
        if($imageUrl){
            $user->photo = $imageUrl;
        }
        $user->first_name = $data['firstName'];
        $user->last_name = $data['lastName'];
        $user->phone_number = $request['phone'];
        $user->birthday = $request['birthday'];
        $user->address = $request['address'];
        $user->save();
        return redirect()->route('users.showProfile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function showLogin()
    {
        return view("user.signin");
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'loginemail' => 'required',
            'loginpassword' => 'required'
        ]);

        $credentials = ['email' => $data['loginemail'], 'password' => $data['loginpassword']];

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where('email', $data['loginemail'])->first();
            $request->session()->put('user', $user);
            return redirect()->route('landing');
        } else {
            if (User::where('email', $data['loginemail'])->exists()) {
                // Người dùng đã nhập đúng email nhưng sai mật khẩu
                return redirect()->route('users.showlogin')->with('LoginFailed', 'Invalid password. Please try again.');
            } else {
                // Người dùng đã nhập sai email
                return redirect()->route('users.showlogin')->with('LoginFailed', 'Invalid email. Please try again.');
            }
        }
    }
    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('landing');
    }
    public function showRegister()
    {
        return view('user.signup');
    }
    public function updateCurrentBudget(Request $request){
        $data = $request->validate([
            'userid' => ['required'],
            'current_budget_money' => ['numeric']
        ]);
        $user = User::findOrFail($data['userid']);
        $user->current_budget = $data['current_budget_money'];
        $user->save();
        return redirect()->route('budgetCategories.index');
    }
    public function showProfile(){
        $user = session('user');
        $User = User::findOrFail($user['id']);
        return view('user.profile', [
            'user' => $User
        ]);
    }
    public function managementWeb(){
        $user = session('user');
        $User = User::findOrFail($user['id']);

        $tasks = Task::task($user['id'])->get();
        $completedCount = Task::completedTask($user['id'])->count();
        if( UserWeb::where('user_id',$user['id'])->get()  ){
            return view('layouts.toolweb.index',[
                'currentBudget' => $User->current_budget,
                'taskCount' => $tasks->count(),
                'completedCount' => $completedCount
            ]);
        }else{
            return redirect()->route('templates.index');
        }
    }
    protected function storeImage(Request $request, string $userId){
        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newFileName = "user" . $userId . "." .$extension; 
            $path = $request->file('photo')->storeAs('public/profile-image',$newFileName);
            return substr($path,strlen('public/'));
        }else{
            return null;
        }
    }
}
