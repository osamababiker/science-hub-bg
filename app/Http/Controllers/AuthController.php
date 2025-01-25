<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator, DB, Auth, Mail, App;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /** Register a new user */
    public function register(Request $request){
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|confirmed'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user; 
    }


     /** Login with google  */
     public function loginWithGoogle(Request $request){
        $rules = [
            'email' => 'required',
            'name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);
      
        $user = User::where('email', $request->email)->first();
        if($user){
            return $user->createToken($request->email)->plainTextToken; 
        }else{
            $digits = mt_rand(1000,9999);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return $user->createToken($request->email)->plainTextToken; 
        }
        
    }


    /** Log user in */
    public function login(Request $request){
        $rules = [
            'email' => "required|string",
            'password' => 'required'
        ];
    
        // Validate the request inputs
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        // Find the user based on email
        $user = User::where('email', $request->email)->first();
    
        // Check if user exists and if password is correct
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json('Unauthorized', 401);
        } 
    
        // Create token for the user
        $token = $user->createToken($request->email)->plainTextToken;
    
        // Return the user data along with token and the `bio`, `image`
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    /** Update user info */
    public function update(Request $request) {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'userId' => 'required|exists:users,id', // Ensure userId corresponds to a valid user
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Optional image field
        ];
    
        // Validate the request
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $image_name = null; 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '_' . rand(1000, 9999) . '.' . $image->extension();
            $image->move(public_path('upload/users'), $image_name);
        }
    
        // Find the user
        $user = User::find($request->userId);
    
        // Update user fields
        $user->name = $request->name;
        $user->bio = $request->bio; 
        $user->image = $image_name ?? $user->image; 
        $user->save();
    
        // Return the updated user
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ], 200);
    }

    /** Update user password */
    public function updatePassword(Request $request){
        $rules = [
            'password' => "required",
            "new_password" => "required",
            'userId' => 'required' 
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);
        $user = User::find($request->userId);
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json('Unauthorized', 401);
        } 
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'Password updated successfully',
            'user' => $user,
        ], 200);
    }


    /** Return new user  */
    public function user(Request $request){
        $user = User::where('id', auth()->user()->id)->first();
        return $user; 
    } 

    /** Forget password  */
    public function ForgetPasswordForm(Request $request){
        $rules = [
            'email' => "required|email|exists:users",
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
            return response()->json($validator->errors(), 400);

        try {
            $token = Str::random(64);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('dashboard.emails.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password'); 
            });
        } catch (\Exception $e) {
            return response()->json($e->getMessage(),500);
        }

        return response()->json('Email sended successfully',200);
    }

    /** Reset password */
    public function ResetPasswordForm(Request $request){
        $rules = [
            'email' => "required|email|exists:users",
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token 
            ])->first();

        if(!$updatePassword){
            return response()->json('Invalid Token', 400);
        }
        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return response()->json('Password updated successfully',200);
    }

    /** Log user out */
    public function logout (Request $request) {
        $user =  $request->user();
        $user->tokens()->delete();
        return response('You have been successfully logged out!', 200);
    }

}