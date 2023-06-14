<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Hash;
use Auth;
 
class AdminAuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function index(){
        $admin = Admin::get();
        return view('admin.index', compact('admin'))->with('i');
    }
 
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            dd($request);
            $user = auth()->guard('admin')->user();
            if($user->is_admin == 1){
                return redirect()->route('admin')->with('success','You are Logged in sucessfully.');
            }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }
 
    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }

    public function register()
    {
        return view('admin.auth.register');
    }
      
    public function customRegister(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("admin/login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return Admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    

    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.dashboard');
        }

        return redirect()->route('admin.auth.login')->with('error', 'Bạn không được phép truy cập.');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('thongbao','xóa thanh cong');
    }



}