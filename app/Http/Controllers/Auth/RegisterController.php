<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DriverDetail;
use App\Models\User;
use App\Models\UserDetails;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'phone' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => isset($data['password']) ? Hash::make($data['password']) : null,
            'user_type' => $data['user_type'],
            'state' => $data['state'],
            'city' => $data['city'],
            'country' => $data['country'],
            'phone' => $data['phone'],
        ]);

        if (isset($data['image']) && $data['image']->isValid()) {

            $image = $data['image'];
            $path = $data['image']->store('images', 'public');

            // $user->image = asset('storage/' . $path);

            //  $imagePath = $data['image']->store('profile_image', 'public');
            $u = User::find($user->id);
            $u->image = asset('storage/' . $path);
            $u->save();

        }
        if (isset($data['my_image']) && $data['my_image'] != null) {
            $u = User::find($user->id);
            $u->image = $data['my_image'];
            $u->save();
        }

        if ($data['user_type'] === 'Tourist') {
            // Create a record in the tourist_details table
            UserDetails::create([
                'user_id' => $user->id,
                'place_type' => $data['place_type'],
                'food_type' => $data['food_type'],
                'accomodation_type' => $data['accomodation_type'],

            ]);
        } elseif ($data['user_type'] === 'Driver') {
            // Create a record in the driver_details table
            DriverDetail::create([
                'user_id' => $user->id,
                'age' => $data['age'],
                'cnic' => $data['cnic'],
                'address' => $data['address'],
                'location' => $data['location'],
                'driver_personal_info' => $data['driver_personal_info'],
                'price_per_day' => $data['price_per_day'],
                'vehicle_type' => $data['vehicle_type'],
                'model' => $data['model'],
                'manufacturer' => $data['manufacturer'],

            ]);
        }

        return $user;
    }
}
