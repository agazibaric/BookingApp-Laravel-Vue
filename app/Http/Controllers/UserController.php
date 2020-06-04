<?php

namespace App\Http\Controllers;

use App\User;
use App\Book;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     /**
     * Show the form for editing the user.
     *
     * @param  \App\User  $book
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('user.edit')->with('user', $user);
        }
    }

    public function update(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            // Validate user fields
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'email:rfc'
            ]);

            // Update user
            DB::table('users')
              ->where('id', $userId)
              ->update([
                  'name' => $request['name'],
                  'email' => $request['email']
              ]);
        }
        return redirect('home');
    }

    public function editPassword()
    {
        return view('user.editpassword');
    }

    public function updatePassword(Request $request) {
        if(Auth::Check()) {
            $request->validate([
                'old_password'     => 'required',
                'new_password'     => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);
            
            // Check if user entered correct current password
            $current_password = Auth::User()->password;           
            if(Hash::check($request['old_password'], $current_password)) {        
                $userId = Auth::User()->id;                       

                // Update user password
                DB::table('users')
                ->where('id', $userId)
                ->update([
                    'password' => Hash::make($request['new_password']),
                ]);
                return redirect('home');
            }

            // If hashes don't match, user entered wrong current password
            return back()->with('error', 'You entered wrong current password'); 
        }
        return redirect('home');
    }

    public function admin_credential_rules(array $data) {
        $messages = [
            'currentPassword.required' => 'Please enter current password',
            'newPassword.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'currentPassword' => 'required',
            'newPassword' => 'required|same:newPassword',
            'rePassword' => 'required|same:newPassword',     
        ], $messages);

        return $validator;
    }  


}
