<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Diploma;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', Rule::in(['user', 'formateur'])],
            'image' => ['required', 'image', 'max:2048'], // Image is required for both roles
        ];

        if ($data['role'] === 'formateur') {
            $rules = array_merge($rules, [
                'date_naissance' => ['required', 'date'],
                'university' => ['required', 'string'],
                'nationality' => ['required', 'string'],
                'diplomas' => ['required', 'array'],
                'about' => ['required', 'string'],
            ]);
        }

        return Validator::make($data, $rules, [
            'date_naissance.required' => 'The date of birth is required for formateur role.',
            'university.required' => 'The university is required for formateur role.',
            'nationality.required' => 'The nationality is required for formateur role.',
            'diplomas.required' => 'At least one diploma is required for formateur role.',
            'image.required' => 'Profile image is required for all roles.',
            'about.required' => 'About is required for formateur role.',
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'] === 'formateur' ? User::FORMATEUR_ROLE : User::USER_ROLE,
            'date_naissance' => $data['role'] === 'formateur' ? $data['date_naissance'] : null,
            'university' => $data['role'] === 'formateur' ? $data['university'] : null,
            'nationality' => $data['role'] === 'formateur' ? $data['nationality'] : null,
            'about' => $data['role'] === 'formateur' ? $data['about'] : null,
        ]);

        if ($data['role'] === 'formateur' && isset($data['diplomas'])) {
            foreach ($data['diplomas'] as $diploma) {
                $user->diplomas()->create(['diploma' => $diploma]);
            }
        }

        // Save profile image
        if (isset($data['image'])) {
            $imageName = $data['image']->getClientOriginalName();
            $data['image']->move(public_path('imgs'), $imageName);
            $user->update(['image' => $imageName]);
        }

        return $user;
    }

    protected function registered($request, $user)
    {
        return redirect($this->redirectTo);
    }
}
