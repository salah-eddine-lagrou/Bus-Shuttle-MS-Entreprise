<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'description' => ['required', 'string', 'max:500'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'digits:10'],
            'siteWeb' => ['nullable', 'string', 'max:255', 'url'],
            'secteur' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Entreprise
     */

    protected function create(array $data)
    {
        $imageName = null;
        if (isset($data['image'])) {
            $imageName = $data['image']->getClientOriginalName();
            // Uncomment and complete image handling code here
            // For example:
            // $path = $data['image']->store('public/images');
            // $url = asset($path);
        } else {
            $imageName = 'company avatar.png';
        }

        $user = new User();
        $user->name = $data['nom'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return Entreprise::create([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'adresse' => $data['adresse'],
            'telephone' => $data['telephone'],
            'password' => Hash::make($data['password']),
            'description' => $data['description'],
            'siteWeb' => $data['siteWeb'],
            'secteur' => $data['secteur'],
            'image' => $imageName, // Store the image URL in the database
        ]);
    }

    public function registration()
    {
        return view('auth.register');
    }
    public function logging()
    {
        return view('auth.logging');
    }

}
