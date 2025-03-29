<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ottieni l'ID dell'utente loggato
        $userId = Auth::id();
    
        // Inizializza la query
        $query = UserPassword::where('user_id', $userId);  // Filtro per l'utente autenticato
    
        // Filtra per nome se è stato selezionato un nome dal dropdown
        if ($request->has('filter_name') && $request->filter_name != '') {
            $query->where('name', 'like', '%' . $request->filter_name . '%');
        }
    
        $passwords = $query->get(); // Ottieni le password filtrate per l'utente
        $user = User::all();
        return view('admin.passwords.index', compact('passwords', 'user'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.passwords.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        
        $newUserPassword = new UserPassword();
        $newUserPassword->user_id = Auth::id();
        $newUserPassword->name = $data['name'];
        $newUserPassword->username = $data['username'];
        $newUserPassword->password = Crypt::encryptString($data['password']);
        $newUserPassword->favourite = isset($data['favourite']) && $data['favourite'] !== '' ? (int) $data['favourite'] : 0;
        // $newUserPassword->favourite = (int) $data['favourite'];
        $newUserPassword->color = $data['color'];
        $newUserPassword->save();

        return redirect()->route('admin.passwords.index', ['userPassword' => $newUserPassword->id]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $password = UserPassword::findOrFail($id);
        $decryptPsw = Crypt::decryptString($password->password);
        return view('admin.passwords.show', compact('password','decryptPsw'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPassword $password)
    {
        $decryptPsw = Crypt::decryptString($password->password);
        return view('admin.passwords.edit', compact('password','decryptPsw'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserPassword $password)
    {
        $data = $request->all();

        $password->user_id = Auth::id();
        $password->name = $data['name'];
        $password->username = $data['username'];
        $password->password = Crypt::encryptString($data['password']);
        $password->favourite = isset($data['favourite']) && $data['favourite'] !== '' ? (int) $data['favourite'] : 0;
        $password->color = $data['color'];
        $password->update();

        $decryptPsw = Crypt::decryptString($password->password);
        return view('admin.passwords.show', compact('password', 'decryptPsw'))->with('message', 'CARAMBA');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPassword $password)
    {
        $password = UserPassword::findOrFail($password->id);
        $password->delete();

        return redirect()->route('admin.passwords.index')->with('message', 'Password eliminata correttamente');
    }
}
