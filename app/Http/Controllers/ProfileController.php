<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Страница редактирования профиля (Функция 13)
     */
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * Обновление профиля (Функция 13)
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z]+$/|max:30',
            'surname' => 'required|string|regex:/^[a-zA-Z]+$/|max:30',
            'email' => 'required|string|email|max:50|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'confirmed'
            ],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.regex' => 'Имя должно содержать только латинские буквы',
            'surname.regex' => 'Фамилия должна содержать только латинские буквы',
            'email.email' => 'Некорректный формат email',
            'email.unique' => 'Этот email уже используется',
            'password.min' => 'Пароль должен содержать минимум 8 символов',
            'password.regex' => 'Пароль должен содержать буквы разных регистров и цифры',
            'password.confirmed' => 'Пароли не совпадают',
            'avatar.image' => 'Файл должен быть изображением',
            'avatar.max' => 'Размер файла не должен превышать 2 МБ',
        ]);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete('avatars/' . $user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = basename($avatarPath);
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Профиль успешно обновлён!');
    }
}