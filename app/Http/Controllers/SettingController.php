<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\User;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = auth()->user();
        if ($auth->is_admin) {
            $listnavitem = Dashboard::getNav();
            return view('dashboard.admin.setting.index', [
                'title' => 'Setting',
                'listnav' => $listnavitem,
                'auth' => $auth,
            ]);
        } else {
            $listnavitem = Dashboard::getNavUser();
            return view('dashboard.member.setting.index', [
                'title' => 'Setting',
                'listnav' => $listnavitem,
                'auth' => $auth,

            ]);
        }
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
        $auth = auth()->user();
        $listnavitem = $auth->is_admin ? Dashboard::getNav() : Dashboard::getNavUser();
        $user = User::findOrFail($id);

        return view($auth->is_admin ? 'dashboard.admin.setting.edit' : 'dashboard.member.setting.edit', [
            'title' => 'Edit Profile',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'user' => $user,
        ]);
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
        $user = User::where('id', '=', $id)->first();
        $data = $request->validate([
            'name' => 'required|max:255',
            'username' => ($request->username == $user->username) ?  'required|min:3|max:255' : 'required|min:3|max:255|unique:users',
            'email' => ($request->email == $user->email) ?  'required|email' : 'required|email|unique:users',
            'address' => 'nullable|max:255',
            'no_telphone' => 'nullable|max:255',
        ]);
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('img', ['disk' => 'img']);
        }

        User::where('id', '=', $id)->update($data);

        return back()->with('messege', 'Profile has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}