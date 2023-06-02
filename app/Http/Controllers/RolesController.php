<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Role_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $currentUser = Auth::user();
        // $currentTeam = $currentUser->team;
        // $users = $currentTeam->users;

        $users = User::all();
        $roles = Role::all();
        $userRoles = Role_user::all();

        return view('authorizations')->with([
            'users' => $users,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       // dd($request);



        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'usertype' => 'required|in:admin,creator,epp,company',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->back()->with('status', 'Ruolo assegnato con successo!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
