<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('user.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $typePrefix = 'PF';
        $year = date('y'); // Get the last two digits of the year (e.g., '24' for 2024)

        // Find the most recent code for the given type and year
        $lastCode = User::where('code', 'like', $typePrefix . '-' . $year . '%')
            ->orderBy('id', 'desc')
            ->first();

        // Extract and increment the last number or start at 1 if none exists
        $newNumber = $lastCode ? (int) substr($lastCode->code, strlen($typePrefix . '-' . $year)) + 1 : 1;

        // Construct the new code
        $code = $typePrefix . '-' . $year . $newNumber;
        $user = User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'member_id'   => $code,
            'phone'       => $request->phone,
            'institution' => $request->institution,
            'blood_group' => $request->blood_group,
            'nid_number'  => $request->nid_number,
            'district'    => $request->district,
            'address'     => $request->address,
            'password'    => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
