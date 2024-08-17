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
        try {
            // Validate the request data
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $typePrefix = 'PF';
            $year = date('y'); // Get the last two digits of the year (e.g., '24' for 2024)

            // Find the most recent code for the given type and year
            $lastCode = User::where('member_id', 'like', $typePrefix . '-' . $year . '%')
                ->orderBy('id', 'desc')
                ->first();

            // Extract and increment the last number or start at 1 if none exists
            $newNumber = $lastCode ? (int) substr($lastCode->member_id, strlen($typePrefix . '-' . $year)) + 1 : 1;

            // Construct the new code
            $code = $typePrefix . '-' . $year . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

            // Create the user
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
                'status'      => 'active',
                'password'    => Hash::make($request->password),
            ]);

            // Trigger the Registered event
            event(new Registered($user));

            // Log the user in
            Auth::login($user);

            // Redirect to the home page
            return redirect(RouteServiceProvider::HOME);

        } catch (\Exception $e) {
            // Log the exception
            // Log::error('User creation failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
