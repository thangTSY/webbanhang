<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // private $client ;
    public function index()
    {
        $client = User::get();
        // dd($client);
        return view('client.index', compact('client'))->with('i');
    }

    public function create()
    {
        return view('client.add');
    }

    public function store(Request $request)
    {
        User::create($data);
        return redirect()->route('client.index')->with('thongbao','them thanh cong');
    }

    public function search(Request $request)

    {
        $searchKeyword = $request->input('keyword');
        $client = User::where('name', 'like', "%$searchKeyword%")
                            ->orWhere('email', 'like', "%$searchKeyword%")->orWhere('password', 'like', "%$searchKeyword%")
                            ->get();
        return view('client.index', compact('client'))->with('i');
    }

    public function show(string $id)
    {
    
    }

    public function edit($id)
    {
        $client = User::find($id);
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, User $client)
    {
        $client->update($request->all());
        return redirect()->route('client.index')->with('thongbao','update thanh cong');
    }
    

    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('client.index')->with('thongbao','xóa thanh cong');
    }
}