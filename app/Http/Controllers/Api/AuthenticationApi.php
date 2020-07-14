<?php

namespace App\Http\Controllers\Api;

use Str;
use Auth;
use App\User;
use App\Warga;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthenticationApi extends Controller
{
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), 
            // rules
            [
                'email'     =>'required|email:rfc,dns',
                'password'  =>'required'
            ],
            //error's message : 
            [
                'email'     => "Email kamu tidak valid",
                'required'  => 'Kolom :attribute tidak boleh kosong!',
            ]
        );

        if($validation->fails())
            return [
                'status'    => false,
                'message'   => $validation->errors()->first()
            ];
        
        //required array for login attempt
        $loginAttepmt = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if(Auth::attempt($loginAttepmt)){
            $user = User::find(Auth::id());
            $user = $request->user();
            
            $tokenResult    = $user->createToken('Personal Access Token');
            $token          = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();

            /* ======= if only verified email can login ========
            if($user->email_verified_at == null)
                return[
                    'status' => false,
                    'message' => "Demi keamanan, kamu harus memverifikasi email kamu terlebih dahulu!"    
                ];
            */
            
            $user->api_token = $tokenResult->accessToken;
            return[
                'status'    => true,
                'message'   => "Login berhasil!",
                'data'      => $user,
            ];
        }else{
            return[
                'status'    => false,
                'message'   => "Email atau Password salah!"
            ];
        }
    }

    public function nik_auth(Request $request)
    {
        $validation = Validator::make($request->all(), 
            // rules
            [
                'nik'       =>'required|numeric',
            ],
            //error's message : 
            [
                'required'  => 'Kolom :attribute tidak boleh kosong!',
                'numeric'   => 'NIK hanya dapat diisi dengan angka'
            ]
        );

        if($validation->fails())
            return [
                'status'    => false,
                'message'   => $validation->errors()->first()
            ];
        
        //checking nik is exist
        $warga = Warga::where('no_nik','=', $request->nik)->count();
        if(($warga == 0))
            return [
                'status'    => false,
                'message'   => "Nik anda tidak terdaftar sebagai warga desa sini."
            ];    

        if($warga == 1){
            $warga = Warga::where('no_nik','=', $request->nik)->first();
            
            $tokenResult    = $warga->createToken('Personal Access Token');
            $token          = $tokenResult->token;

            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();

            /* ======= if only verified email can login ========
            if($user->email_verified_at == null)
                return[
                    'status' => false,
                    'message' => "Demi keamanan, kamu harus memverifikasi email kamu terlebih dahulu!"    
                ];
            */
            
            return[
                'status'    => true,
                'message'   => "Login berhasil!",
                'data'      => $warga,
                'api_token' => $tokenResult->accessToken
            ];
        }else{
            return[
                'status'    => false,
                'message'   => "Email atau Password salah!"
            ];
        }
    }
}
