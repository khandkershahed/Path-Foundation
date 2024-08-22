<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Toastr;

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
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['nullable', 'string', 'regex:/^\+?[0-9]*$/'],
            'photo' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'institution' => ['nullable', 'string'],
            'blood_group' => ['nullable', 'string'],
            'nid_number' => ['nullable', 'string', 'unique:users,nid_number'],
            'district' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'phone.regex' => 'The phone number format is invalid.',
            'photo.image' => 'The photo must be an image.',
            'photo.mimes' => 'The photo must be a file of type: jpeg, png, jpg, gif.',
            'photo.max' => 'The photo may not be greater than 2MB.',
            'nid_number.unique' => 'The NID number has already been taken.',
        ]);

        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $typePrefix = 'PB';
            $year = date('Y'); // Get the last two digits of the year (e.g., '24' for 2024)

            // Find the most recent code for the given type and year
            $lastCode = User::where('member_id', 'like', $typePrefix . '-' . $year . '%')
                ->orderBy('id', 'desc')
                ->first();

            $newNumber = $lastCode ? (int) substr($lastCode->member_id, strlen($typePrefix . '-' . $year)) + 1 : 1;

            // Construct the new code
            $code = $typePrefix . '-' . $year . $newNumber;

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

            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
