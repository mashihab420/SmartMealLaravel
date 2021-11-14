<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\MainUsers;
use http\Env\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{


    public function createManager(Request $request)
    {
        $input = $request->all();

        $mainusers = new MainUsers();
        $mainusers->username = $request->username;
        $mainusers->email = $request->email;
        $mainusers->phone = $request->phone;
        $mainusers->admin_unique_token = $request->admin_unique_token;
        $mainusers->check_meal = $request->check_meal;
        $mainusers->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
    }



    public function loginManager(Request $request) {


     /*  if ($request->headers->get('Content-Type') == 'application/json'){



            $data= $request->all();
            return new JsonResponse($data);
        }else{

            return new JsonResponse(array('status'=>'500'));
        }*/



        $data= $request->get('username');


        $mainusers = MainUsers::where('username', $data)->first();

        if ($mainusers!=null){
            return $mainusers;
        }else{
            return new JsonResponse([
                'message' => 'Not found',
                'status' => 500
            ]);
        }





    }

}
