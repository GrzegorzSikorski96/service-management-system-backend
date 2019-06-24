<?php

declare(strict_types=1);

namespace Sms\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Sms\Http\Controllers\Controller;
use Sms\Models\User;

/**
 * Class RegisterController
 * @package Sms\Http\Controllers\Auth
 */
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $response;

    /**
     * RegisterController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register']]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


        if ($validator->fails()) {
            return $validator->errors();
            /*return $this->response
                ->setFailureStatus(Response::HTTP_BAD_REQUEST)
                ->setData($validator->errors()->toArray())
                ->getResponse();*/
        }

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * @param Request $request
     * @param $user
     * @return string
     */
    protected function registered(Request $request, $user)
    {
        return "zarejestrowano";
        //return $this->response->setMessage('User registered')->getResponse();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'agency_role_id' => $data['agency_role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
