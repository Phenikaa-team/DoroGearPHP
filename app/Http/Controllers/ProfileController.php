<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{

    public function show(Request $request)
    {
        $user = $request->user();

        return view('profile.show', [
            'user' => $user,
        ]);
    }

    public function updateInfo(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->user_id, 'user_id')
            ],
        ]);

        $user->fill([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('profile.show')->with('status', 'Cập nhật thông tin thành công!');
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update([
            'password' => $request->password,
        ]);

        return redirect()->route('profile.show')->with('status', 'Đổi mật khẩu thành công!');
    }

    public function orders(Request $request)
    {
        $user = $request->user();

        $orders = $user->orders()->with('items')->latest()->paginate(10);

        return view('profile.orders', compact('user', 'orders'));
    }
}
