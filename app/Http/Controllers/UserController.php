<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
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
        return redirect()->route('landing');
    }
    function showRegister()
    {
        return view('user.signup');
    }
    function updateCurrentBudget(Request $request){
        $data = $request->validate([
            'userid' => ['required'],
            'current_budget_money' => ['numeric']
        ]);
        $user = User::findOrFail($data['userid']);
        $user->current_budget = $data['current_budget_money'];
        $user->save();
        return redirect()->route('budgetCategories.index');
    }
}
