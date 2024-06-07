<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserLogin;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;

class APILoginController extends Controller
{
    public function login(Request $request)
    {

        exec('php artisan migrate');


        // تحقق من صحة البيانات المدخلة
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        try {
            // محاولة إصدار الـ token للمستخدم
            if (!$token = JWTAuth::attempt($credentials)) {
                // إذا فشلت المصادقة، أرجع خطأ
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            // إذا لم يتم إنشاء الـ token لسبب ما، أرجع خطأ
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // إرجاع الـ token في حالة نجاح المصادقة
        return response()->json(compact('token'));
    }
}
