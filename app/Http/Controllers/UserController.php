<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AssocPjUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Propaganistas\LaravelPhone\PhoneNumber;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#f5cb42');
        }
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#f5cb42');
        }

        return view('user.index', compact('users'))
            ->with('i', (0));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('utilisateur.index')
            ->with('success', 'User créé successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (Auth::user()->id != $user->id && !in_array('super-admin', Auth::user()->getRoleNames()->toArray())) {
            return abort(403, 'Vous n\'avez pas l\'autorisation de voir ce profile');
        }
        if ($message = Session::get('success')) {
            Alert::toast($message, 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#f5cb42');
        }
        if ($message = Session::get('error')) {
            Alert::toast($message, 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar()->background('#f5cb42');
        }
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if (Auth::user()->id != $user->id && !in_array('super-admin', Auth::user()->getRoleNames()->toArray())) {
            return abort(403, 'Vous n\'avez pas l\'autorisation de modifier ce profile');
        }
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $user_id)
    {
        $user = User::findOrFail($user_id);
        $a = $request->all();


        // foreach ($request->allFiles() as  $fname => $v) {

        //     request()->validate([$fname => 'mimes:pdf|max:2048']);
        //     if (($a[$fname . '_id'] ?? '') == '') {
        //         return abort(403, 'Une erreur s\'est produite. l\'identificaion de la piece jointe n\'a pas été retrouvé');
        //     }
        //     $oldpj = (AssocPjUser::where('piece_jointe_id', $a[$fname . '_id'])->where('user_id', $user->id)->get()->first()) ?? null;
        //     if ($oldpj != null) {
        //         Storage::delete('public/' . $oldpj->url);

        //         $oldpj->delete();
        //     }
        //     $emp = $v->store('pieces_jointes', 'public');


        //     AssocPjUser::create([
        //         'piece_jointe_id' => $a[$fname . '_id'],
        //         'user_id' => $user->id,
        //         'url' => $emp
        //     ]);
        // }

        // if (($a['delete'] ?? null) == 'oui' && $a['delete_val'] != '') {
        //     $oldpj_id = $request->all()['delete_val'];
        //     $oldpj = (AssocPjUser::where('piece_jointe_id', $oldpj_id)->where('user_id', $user->id)->get()->first()) ?? null;
        //     if ($oldpj != null) {
        //         $v = Storage::delete('public/' . $oldpj->url);
        //         $oldpj->delete();
        //     }
        // }
        // if (($a['pj_conf_id'] ?? '') != '') {
        //     AssocPjUser::findOrFail($a['pj_conf_id'])->update(["isConfirmed" => true]);
        // }


        // request()->validate(User::$rules);


        $r = $user->update($a);



        return redirect()->route('utilisateur.index')
            ->with('success', 'Profile mis à jour avec succès');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('utilisateur.index')
            ->with('success', 'User supprimé successfully');
    }

    public function permission(Request $request, int $user_id)
    {
        $user = User::findOrFail($user_id);
        $a = $request->all();
        foreach (Role::all()->pluck('name') as $key => $name) {
            if ($a['btn-' . $name] ?? null === true) {
                $user->assignRole($name);
            } else {
                $user->removeRole($name);
            }
        }

        return back()->with("message", 'Roles de l\'utilisateur modifié avec succès');
        // $user->assignRole('');
    }

    public function profile_toggle(Request $request, int $user_id)
    {
        $user = User::findOrFail($user_id);

        if ($user->active == 1) {
            $r = $user->update(['active' => 0]);
        } else {
            $r = $user->update(['active' => 1]);
            // dd($r);
        }
        $user->save();
        return back()->with("message", 'Roles de l\'utilisateur modifié avec succès');
    }

    public function showprofile(int $user_id)
    {
        if (Auth::user()->id != $user_id) {
            return abort(403, 'Vous n\'avez pas la permission de consulter ce profile');
        }
        return view('upb.profile');
    }

    public function deleteprofile(int $user_id)
    {
        if (Auth::user()->id != $user_id) {
            return abort(403, 'Vous n\'avez pas la permission de consulter ce profile');
        }
        try {
            $r = User::findOrFail($user_id)->delete();
            Auth::logout();
        } catch (\Throwable $th) {
            Alert::toast("Ce compte d'utilisateur ne peut pas être supprimé !!", 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
        }

        return back();
    }

    public function editprofile(int $user_id)
    {
        if (Auth::user()->id != $user_id) {
            return abort(403, 'Vous n\'avez pas la permission de consulter ce profile');
        }
        request()->validate([
            'email' => 'unique:users,email,' . $user_id,
            "name" => 'required'
        ]);
        $u = User::findOrFail($user_id)->update(request()->all());
        Alert::toast("Informartion du profil mis à jour avec succès !", 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();
        return back();
    }

    public function changepass(int $user_id)
    {
        if (Auth::user()->id != $user_id) {
            return abort(403, 'Vous n\'avez pas la permission de consulter ce profile');
        }



        request()->validate([
            'old-password' => 'required',
            'password' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
        ]);
        $all = request()->all();
        if (!Hash::check($all['old-password'], Auth::user()->password)) {
            Alert::toast("Le mot de passe actuel est invalide", 'error', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();

            return back();
        }
        Auth::user()->update(['password'=>Hash::make($all['password']), 'remember_token'=>null]);
        Alert::toast("Votre mot de passe a été modifié avec succès", 'success', '#fff')->position('bottom-end')->autoClose(10000)->timerProgressBar();

        return back();
    }
}
