<?php

namespace App\Http\Controllers;

use App\DispatcherMail\WelcomeUserMailDispatcher;
use App\Http\Requests\CreateUserRequest;
use App\Mail\WelcomeUserMail;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Larch\Actions\SaveUserAction;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * salva um usuário e dispara um email de boas vindas
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User($request->validated());
        $mailDispathcer = new WelcomeUserMailDispatcher();

        (new SaveUserAction($user, $mailDispathcer))->execute();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
