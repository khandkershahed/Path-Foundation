<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestOrder = Faq::latest('order')->first();
        $order_number = $latestOrder ? $latestOrder->order + 1 : 1;

        return view('admin.pages.faq.index', [
            'faqs' => Faq::oldest('order')->get(),
            'order_number' => $order_number
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
        $validator = Validator::make(
            $request->all(),
            [
                'question'  => 'required',
                'answer'  => 'required',
                'order' => 'required|unique:faqs,order',
            ],
            [
                'unique' => 'This order has already been taken for another faq.',
                'required' => 'This :attribute must be required.',
            ],
        );

        if ($validator->passes()) {
         Faq::create([
            'category' => $request->category,
            'question' => $request->question,
            'answer'   => $request->answer,
            'order'    => $request->order,
            'status'   => $request->status,
        ]);
        flash()->addSuccess('Data has been uploaded Successfully');
    }else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                flash()->addError($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
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

        $faq = Faq::findOrFail($id);
        $validator = Validator::make(
            $request->all(),
            [
                'name'  => 'required',
                'order' => 'required|unique:frontend_menus,order,' . $faq->id,
                'url'   => 'required',
            ],
            [
                'unique'   => 'This order has already been taken for another menu.',
                'required' => 'The :attribute field is required.',
            ]
        );
        if ($validator->passes()) {
            $faq->update([
                'category' => $request->category,
                'question' => $request->question,
                'answer'   => $request->answer,
                'order'    => $request->order,
                'status'   => $request->status,
            ]);
            flash()->addSuccess('Data has been updated Successfully');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                flash()->addError($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Faq::find($id)->delete();
    }
}
