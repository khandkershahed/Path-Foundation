<?php

namespace App\Http\Controllers\Admin;

use Helper;
use App\Models\LearnMore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LearnMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['learnMores'] = LearnMore::orderBy('id','DESC')->select('learn_mores.id')->get();
        return view('admin.pages.learnMore.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['storys'] =  DB::table('news_trends')->get();
        return view('admin.pages.learnMore.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'badge'                  => 'nullable',
                'title'                  => 'nullable',
                'header_one'             => 'nullable',
                'header_two'             => 'nullable',
                'box_one_title'          => 'nullable',
                'box_one_short_des'      => 'nullable',
                'box_one_link'           => 'nullable',
                'box_two_title'          => 'nullable',
                'box_two_short_des'      => 'nullable',
                'box_two_link'           => 'nullable',
                'box_three_title'        => 'nullable',
                'box_three_short_des'    => 'nullable',
                'box_three_link'         => 'nullable',
                'success_story_title'    => 'nullable',
                // 'success_story_one_id'   => 'nullable',
                // 'success_story_two_id'   => 'nullable',
                // 'success_story_three_id' => 'nullable',
                'consult_title'          => 'nullable',
                'consult_short_des'      => 'nullable',
                'industry_header'        => 'nullable',
                'image_banner'           => 'nullable|image|mimes:png,jpg,jpeg|max:10000',
                'background_image'       => 'nullable|image|mimes:png,jpg,jpeg|max:10000',
            ],
            [
                'mimes' => 'The :attribute must be a file of type: PNG - JPEG - JPG'
            ],

        );

        if ($validator->passes()) {
            $files = [
                'image_banner'     => $request->file('image_banner'),
                'background_image' => $request->file('background_image'),
            ];
            $uploadedFiles = [];

            foreach ($files as $key => $file) {
                if (!empty($file)) {
                    $filePath = 'learnmore/' . $key;
                    $uploadedFiles[$key] = imageUpload($file, $filePath);
                    if ($uploadedFiles[$key]['status'] === 0) {
                        return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                    }
                } else {
                    $uploadedFiles[$key] = ['status' => 0];
                }
            }
            LearnMore::create([
                'image_banner'           => $uploadedFiles['image_banner']['status'] == 1 ? $uploadedFiles['image_banner']['file_path'] : null,
                'background_image'       => $uploadedFiles['background_image']['status'] == 1 ? $uploadedFiles['background_image']['file_path'] : null,
                'badge'                  => $request->badge,
                'title'                  => $request->title,
                'header_one'             => $request->header_one,
                'header_two'             => $request->header_two,
                'box_one_title'          => $request->box_one_title,
                'box_one_short_des'      => $request->box_one_short_des,
                'box_one_link'           => $request->box_one_link,
                'box_two_title'          => $request->box_two_title,
                'box_two_short_des'      => $request->box_two_short_des,
                'box_two_link'           => $request->box_two_link,
                'box_three_title'        => $request->box_three_title,
                'box_three_short_des'    => $request->box_three_short_des,
                'box_three_link'         => $request->box_three_link,
                'success_story_title'    => $request->success_story_title,
                'success_story_one_id'   => $request->success_story_one_id,
                'success_story_two_id'   => $request->success_story_two_id,
                'success_story_three_id' => $request->success_story_three_id,
                'footer'                 => $request->footer,
                'consult_title'          => $request->consult_title,
                'consult_short_des'      => $request->consult_short_des,
                'industry_header'        => $request->industry_header,

            ]);
            Toastr::success('Data has been created');
        } else {
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                Toastr::error($message, 'Failed', ['timeOut' => 30000]);
            }
        }
        return redirect()->back();
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
        $data['learnMore'] = LearnMore::find($id);
        $data['storys'] =  DB::table('news_trends')->get();
        return view('admin.pages.learnMore.edit', $data);
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
        $learnMore = LearnMore::find($id);
        if (!empty($learnMore)) {

            $files = [
                'image_banner'     => $request->file('image_banner'),
                'background_image' => $request->file('background_image'),
            ];
            $uploadedFiles = [];

            foreach ($files as $key => $file) {
                if (!empty($file)) {
                    $filePath = 'learnmore/' . $key;
                    $oldFile = $banner->$key ?? null;

                    if ($oldFile) {
                        Storage::delete("public/" . $oldFile);
                    }
                    $uploadedFiles[$key] = imageUpload($file, $filePath);
                    if ($uploadedFiles[$key]['status'] === 0) {
                        return redirect()->back()->with('error', $uploadedFiles[$key]['error_message']);
                    }
                } else {
                    $uploadedFiles[$key] = ['status' => 0];
                }
            }

            $learnMore->update([
                'image_banner'           => $uploadedFiles['image_banner']['status'] == 1 ? $uploadedFiles['image_banner']['file_path'] : $learnMore->image_banner,
                'background_image'       => $uploadedFiles['background_image']['status'] == 1 ? $uploadedFiles['background_image']['file_path'] : $learnMore->background_image,
                'badge'                  => $request->badge,
                'title'                  => $request->title,
                'header_one'             => $request->header_one,
                'header_two'             => $request->header_two,
                'box_one_title'          => $request->box_one_title,
                'box_one_short_des'      => $request->box_one_short_des,
                'box_one_link'           => $request->box_one_link,
                'box_two_title'          => $request->box_two_title,
                'box_two_short_des'      => $request->box_two_short_des,
                'box_two_link'           => $request->box_two_link,
                'box_three_title'        => $request->box_three_title,
                'box_three_short_des'    => $request->box_three_short_des,
                'box_three_link'         => $request->box_three_link,
                'success_story_title'    => $request->success_story_title,
                'success_story_one_id'   => $request->success_story_one_id,
                'success_story_two_id'   => $request->success_story_two_id,
                'success_story_three_id' => $request->success_story_three_id,
                'footer'                 => $request->footer,
                'consult_title'          => $request->consult_title,
                'consult_short_des'      => $request->consult_short_des,
                'industry_header'        => $request->industry_header,

            ]);
            Toastr::success('Data has been updated');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $learnMore = LearnMore::find($id);

        //image_banner
        if (File::exists(public_path('storage/') . $learnMore->image_banner)) {
            File::delete(public_path('storage/') . $learnMore->image_banner);
        }
        if (File::exists(public_path('storage/requestImg/') . $learnMore->image_banner)) {
            File::delete(public_path('storage/requestImg/') . $learnMore->image_banner);
        }
        if (File::exists(public_path('storage/thumb/') . $learnMore->image_banner)) {
            File::delete(public_path('storage/thumb/') . $learnMore->image_banner);
        }

        //background_image
        if (File::exists(public_path('storage/') . $learnMore->background_image)) {
            File::delete(public_path('storage/') . $learnMore->background_image);
        }
        if (File::exists(public_path('storage/requestImg/') . $learnMore->background_image)) {
            File::delete(public_path('storage/requestImg/') . $learnMore->background_image);
        }
        if (File::exists(public_path('storage/thumb/') . $learnMore->background_image)) {
            File::delete(public_path('storage/thumb/') . $learnMore->background_image);
        }
        $learnMore->delete();
    }
}
