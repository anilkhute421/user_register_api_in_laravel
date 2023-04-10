<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\UserRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends ApiBaseController
{

    public function signup_manually(Request $request)
    {

        \Log::info($request->getContent());

        try {
            $validator = validator($request->all(), UserRequest::signup_manually_user());

            if ($validator->fails()) {
                return $this->sendSingleFieldError($validator->errors()->first(), 201, 200);
            }

            $user = User::create(['email' => $request->email,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number,
                'ip_address' => $request->ip_address,
                'browser' => $request->browser,
                'device_type' => $request->device_type,
                'User_type' => $request->User_type]);

            if ($user) {
                return $this->sendResponse($user, 'Registration Successful', 200, 200);
            } else {
                return $this->sendSingleFieldError('somthing_went_wrong', 201, 200);
            }

        } catch (\Throwable $th) {

            return $this->sendSingleFieldError('There is some error in this api', 201, 200);
        }

    }

    public function user_address(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        foreach ($data as $item) {
            $address = Address::create([
                'line1' => $item['line1'],
                'line2' => $item['line2'],
                'line3' => $item['line3'],
            ]);
        }
        if ($address) {
            return $this->sendResponse($address, 'address Successful saved', 200, 200);
        } else {
            return $this->sendSingleFieldError('somthing_went_wrong', 201, 200);
        }
    }
}
