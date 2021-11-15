<?php

namespace App\Http\Controllers;

use App\Models\AdditionalInformation;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $info = AdditionalInformation::where('slug','=',$slug)->first();
        $user = User::find($info->user_id);
        return view('user',compact('user'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        $user = auth()->user();
        return view('auth.user.editPage',compact('user'));
    }


    public function update(Request $request)
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $info = AdditionalInformation::where('user_id',$userId)->first();
        $user->FIO = $request['FIO'];
        $user->birthday_date = $request['birthday_date'];
        $info->slug = $request['slug'];
        $info->gender = $request['gender'];
        $info->height = $request['height'];
        $info->parameters = $request['parameters'];
        $info->instagram_link = $request['instagram_link'];
        $info->about_you = $request['about_you'];
        $s1 = $user->save();
        $s2 = $info->save();
        if($s1 && $s2)
            session()->flash('success','Данные были изменены');
        else
            session()->flash('warning','Что-то пошло не так!');
        return redirect()->route('user.edit',[$user->info->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
