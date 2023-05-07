<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiBaseController;
use App\Http\Requests\UserRequest;
use App\Models\Address;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends ApiBaseController
{

    public function signup_manually(Request $request)
    {

        \Log::info($request->getContent());

        // try {
            // $validator = validator($request->all(), UserRequest::signup_manually_user());

            // if ($validator->fails()) {
            //     return $this->sendSingleFieldError($validator->errors()->first(), 201, 200);
            // }

            $user = Employee::create(['email' => $request->email ? $request->email : 'null',
                'name' => $request->name,
                'age' => $request->age,
                'gender' => $request->sex,
                'phone_number' => $request->mobile,
                'govid' => $request->idType ? $request->idType : 'null',
                'idno' => $request->govId ? $request->govId : 'null',
                'gardian' => $request->contactType ? $request->contactType : 'null',
                'gardian_name' => $request->guardianName ? $request->guardianName : 'null',
                'address' => $request->address ? $request->address : 'null',
                'country' => $request->country  ? $request->country : 'null',
                'state' => $request->state ? $request->state : 'null',
                'city' => $request->city ? $request->city : 'null',
                'pincode' => $request->pincode ? $request->pincode : 'null',
                'occuppation' => $request->occuppation ? $request->occuppation : 'null',
                'Religion' => $request->religion ? $request->religion : 'null',
                'marital_status' => $request->maritalStatus ? $request->maritalStatus : 'null',
                'bood_group' => $request->bloodGroup ? $request->bloodGroup : 'null',
                'nationality' => $request->nationality ? $request->nationality : 'null',
                'occuppation' => $request->occupation ? $request->occupation : 'null',
                'emergency_con' => $request->emergencyContact ? $request->emergencyContact : 'null'    
               ]);

            if ($user) {
                return $this->sendResponse($user, 'Registration Successful', 200, 200);
            } else {
                return $this->sendSingleFieldError('somthing_went_wrong', 201, 200);
            }

        // } catch (\Throwable $th) {

        //     return $this->sendSingleFieldError('There is some error in this api', 201, 200);
        // }

    }

    public function user_details(Request $request)
    {
        $data = Employee::get();

        $data = $data->map(function ($employee) {
            $employee->agegender = $employee->age .'/'. $employee->gender;
            return $employee;
        });
        
        if ($data) {
            return $this->sendResponse($data, 'address Successful saved', 200, 200);
        } else {
            return $this->sendSingleFieldError('somthing_went_wrong', 201, 200);
        }
    }
}
