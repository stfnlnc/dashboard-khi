<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->query('search');
        $filter = $request->get('role');
        $roles = Role::orderBy('name', 'asc')->get();

        if($filter) {
            $users = User::whereHas('role', function (Builder $query) use ($filter) {
                $query->where('id', '=', $filter);
            })
                ->orderBy('role_id', 'asc')
                ->paginate(10);
        } else {
            $users = User::where('users.lastname', 'like', '%' . $search . '%')
                ->orWhere('users.email', 'like', '%' . $search . '%')
                ->orWhere('users.firstname', 'like', '%' . $search . '%')
                ->orWhere('users.phone', 'like', '%' . $search . '%')
                ->orderBy('role_id', 'asc')
                ->paginate(10);
        }

        return view('admin.users.index', [
            'users' => $users,
            'roles' => $roles,
            'search' => $search,
            'filter' => $filter,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return Redirect::route('users.index')->with('success', 'L\'utilisateur a été créé');
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->role()->associate($request->validated('role'))->save();
        return to_route('users.index')->with('success', 'L\'utilisateur a été modifié');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('success', 'L\'utilisateur a été supprimé');
    }

}
