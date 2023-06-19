<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(ProfileRequest $request)
    {
        //
    }

    public function imgUploadPost(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->file('file');
            $current_user = auth()->user();

            $fileName = $current_user->cover;
            if (Storage::exists('public/users/' . $fileName)) {
                Storage::delete('public/users/' . $fileName);
                /*
                     Delete Multiple File like this way
                     Storage::delete(['courses/test.png', 'courses/test2.png']);
                 */
            }
            $path = $request->file->store('public/users');
            $current_user->cover = basename($path);

            DB::table('users')->where('email', $current_user->email)->update(['cover' => $current_user->cover]);
            $upload_success = $data->move($path, $current_user->cover);

            return response()->json([
                'success' => 'done',
                'valueimg' => $data
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('security/profile.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $current_user = User::find($id);

        if ($current_user) {
            $current_user->national_code = $request->input('national_code');
            $current_user->father = $request->input('father');
            $current_user->birthdate = $request->input('birthdate');
            $current_user->occupation = $request->input('occupation');
            $current_user->update();

            return response()->json([
                'status' => 200,
                'message' => 'اطلاعات با موفقیت ثبت شد',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'اطلاعاتی یافت نشد',
            ]);
        }
    }

    public function update_password(ProfileRequest $request)
    {
        $current_user = auth()->user();
        if (Hash::check($request->old_password, $current_user->password)) {
            $current_user->update([
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'رمز عبور تغییر کرد',
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'رمز عبور فعلی اشتباه می باشد',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
