<?php

namespace App\Http\Controllers\Admin;

use Toastr;
use App\Models\ExecutivePanel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ExecutivePanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.executivePanel.index', [
            'teams' => ExecutivePanel::latest('id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name'         => ['nullable', 'string', 'max:255'],
            'email'        => ['nullable', 'string', 'email', 'max:255', 'unique:executive_panels,email'],
            'member_id'    => ['nullable', 'string', 'max:255', 'unique:executive_panels,member_id'],
            'phone'        => ['nullable', 'string', 'regex:/^\+?[0-9]*$/'],
            'photo'        => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'designation'  => ['nullable', 'string'],
            'institution'  => ['nullable', 'string'],
            'blood_group'  => ['nullable', 'string'],
            'nid_number'   => ['nullable', 'string', 'unique:executive_panels,nid_number'],
            'district'     => ['nullable', 'string'],
            'address'      => ['nullable', 'string'],
            'status'       => ['nullable', 'string', 'in:active,inactive'], // Assuming status can only be 'active' or 'inactive'
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'member_id.required' => 'The member ID field is required.',
            'member_id.unique' => 'The member ID has already been taken.',
            'phone.regex' => 'The phone number format is invalid.',
            'photo.image' => 'The photo must be an image.',
            'photo.mimes' => 'The photo must be a file of type: jpeg, png, jpg, gif.',
            'photo.max' => 'The photo may not be greater than 2MB.',
            'nid_number.unique' => 'The NID number has already been taken.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be either active or inactive.',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle photo upload if provided
        $files = [
            'photo' => $request->file('photo'),
        ];
        $uploadedFiles = [];
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'executivePanel/' . $key;
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Create a new executive panel record
        try {
            ExecutivePanel::create([
                'name'         => $request->input('name'),
                'email'        => $request->input('email'),
                'member_id'    => $request->input('member_id'),
                'phone'        => $request->input('phone'),
                'photo'        => $uploadedFiles['photo']['status'] == 1 ? $uploadedFiles['photo']['file_path'] : null,
                'designation'  => $request->input('designation'),
                'institution'  => $request->input('institution'),
                'blood_group'  => $request->input('blood_group'),
                'nid_number'   => $request->input('nid_number'),
                'district'     => $request->input('district'),
                'address'      => $request->input('address'),
                'status'       => $request->input('status'),
            ]);

            return redirect()->back()->with('success', 'Executive added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
    public function update(Request $request, $id)
    {
        // Find the executive panel by ID
        $executivePanel = ExecutivePanel::find($id);

        // Check if executive panel exists
        if (!$executivePanel) {
            return redirect()->back()->withErrors(['error' => 'Executive panel not found.']);
        }

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name'         => ['nullable', 'string', 'max:255'],
            'email'        => ['nullable', 'string', 'email', 'max:255', 'unique:executive_panels,email,' . $id],
            'member_id'    => ['nullable', 'string', 'max:255', 'unique:executive_panels,member_id,' . $id],
            'phone'        => ['nullable', 'string', 'regex:/^\+?[0-9]*$/'],
            'photo'        => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'designation'  => ['nullable', 'string'],
            'institution'  => ['nullable', 'string'],
            'blood_group'  => ['nullable', 'string'],
            'nid_number'   => ['nullable', 'string', 'unique:executive_panels,nid_number,' . $id],
            'district'     => ['nullable', 'string'],
            'address'      => ['nullable', 'string'],
            'status'       => ['nullable', 'string', 'in:active,inactive'],
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'member_id.required' => 'The member ID field is required.',
            'member_id.unique' => 'The member ID has already been taken.',
            'phone.regex' => 'The phone number format is invalid.',
            'photo.image' => 'The photo must be an image.',
            'photo.mimes' => 'The photo must be a file of type: jpeg, png, jpg, gif.',
            'photo.max' => 'The photo may not be greater than 2MB.',
            'nid_number.unique' => 'The NID number has already been taken.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status must be either active or inactive.',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $files = [
            'photo' => $request->file('photo'),
        ];
        $uploadedFiles = [];

        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $filePath = 'executivePanel/' . $key;
                $oldFile = $executivePanel->$key ?? null;

                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }
                $uploadedFiles[$key] = newUpload($file, $filePath);
                if ($uploadedFiles[$key]['status'] === 0) {
                    return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                }
            } else {
                $uploadedFiles[$key] = ['status' => 0];
            }
        }

        // Update the executive panel record
        try {
            $executivePanel->update([
                'name'         => $request->input('name'),
                'email'        => $request->input('email'),
                'member_id'    => $request->input('member_id'),
                'phone'        => $request->input('phone'),
                'photo'        => $uploadedFiles['photo']['status'] == 1 ? $uploadedFiles['photo']['file_path'] : $executivePanel->photo,
                'designation'  => $request->input('designation'),
                'institution'  => $request->input('institution'),
                'blood_group'  => $request->input('blood_group'),
                'nid_number'   => $request->input('nid_number'),
                'district'     => $request->input('district'),
                'address'      => $request->input('address'),
                'status'       => $request->input('status'),
            ]);

            return redirect()->back()->with('success', 'Executive updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $executivePanel = ExecutivePanel::findOrFail($id);
        $files = [
            'photo'    => $executivePanel->photo,
        ];
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $oldFile = $executivePanel->$key ?? null;
                if ($oldFile) {
                    Storage::delete("public/" . $oldFile);
                }
            }
        }
        $executivePanel->delete();
    }
}
