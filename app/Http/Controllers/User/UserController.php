<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user_model = User::get();
        return response()->json($user_model);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }


    public function changePassword(Request $request) {
        $input = $request->all();
        $rules = [
            'current_user' => 'required|max:50',
            'password'     => 'required|min:6|confirmed',
            'fullname'     => 'required|min:6',
        ];
        $validator = \Validator::make($input, $rules);
        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'error'   => $validator->messages(),
                    'data'    => 'Nhập thiếu dữ liệu'
                ]
            );
        }
        $current_user = Auth::user()->name;
        //$current_user =  htmlentities($request->current_user);
        $password = bcrypt(htmlentities($request->password));
        $fullname = htmlentities($request->fullname);

        $user = User::where('name', $current_user)->first();
        $user->password = $password;
        $user->fullname = $fullname;
        $user->save();
        return response()->json(
            [
                'success' => true,
                'data'    => 'Update user ' . $current_user . ' successful'
            ]
        );
    }
}
