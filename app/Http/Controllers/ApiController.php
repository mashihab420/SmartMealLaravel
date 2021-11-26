<?php

namespace App\Http\Controllers;


use App\Models\AllMeal;
use App\Models\Category;
use App\Models\MainUsers;
use App\Models\Members;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{


    public function createManager(Request $request)
    {
        $input = $request->all();

        $phone = $request->get('phone');

        $mainuser = MainUsers::where('phone', $phone)->first();

        if ($mainuser) {
            return new JsonResponse(array("message" => "Phone Number Already Register"));
        } else {

            $mainusers = new MainUsers();
            $mainusers->username = $request->username;
            $mainusers->email = $request->email;
            $mainusers->phone = $request->phone;
            $mainusers->password = $request->password;
            $mainusers->admin_unique_token = $request->admin_unique_token;
            $mainusers->check_meal = $request->check_meal;
            $mainusers->save();


            $members = new Members();
            $members->username = $request->username;
            $members->email = $request->email;
            $members->phone = $request->phone;
            $members->password = $request->password;
            $members->manager_unique_token = $request->admin_unique_token;
            $members->check_meal = $request->check_meal;
            $members->save();


            return response()->json([
                "message" => "Manager created"
            ], 201);
        }


    }


    public function loginManager(Request $request)
    {


        /*  if ($request->headers->get('Content-Type') == 'application/json'){


           }else{

               return new JsonResponse(array('status'=>'500'));
           }*/


        $phone = $request->get('phone');
        $password = $request->get('password');


        $mainuser = MainUsers::where('phone', $phone)->where('password', $password)->first();

        if ($mainuser != null) {
            $data = [
                'id' => (integer)$mainuser['id'],
                'username' => (string)$mainuser['username'],
                'email' => (string)$mainuser['email'],
                'phone' => (string)$mainuser['phone'],
                'check_meal' => (bool)$mainuser['check_meal'],
                'admin_unique_token' => (string)$mainuser['admin_unique_token'],
            ];
            return $data;
        } else {
            return new JsonResponse([
                'message' => 'Not found',
                'status' => 500
            ]);
        }


    }

    public function CreateMember(Request $request)
    {


        /* $phone = $request->get('phone');
         $password = $request->get('password');*/
        $token = $request->get('manager_unique_token');


        $phone = $request->get('phone');

        $mainuser = MainUsers::where('phone', $phone)->first();

        if ($mainuser) {
            return new JsonResponse(array("message" => "Phone Number Already Register"));
        } else {

            $mainuser = MainUsers::where('admin_unique_token', $token)->first();

            if ($mainuser != null) {
                $members = new Members();
                $members->username = $request->username;
                $members->email = $request->email;
                $members->phone = $request->phone;
                $members->password = $request->password;
                $members->manager_unique_token = $request->manager_unique_token;
                $members->check_meal = $request->check_meal;
                $members->save();

                return response()->json([
                    "message" => "Member created"
                ], 201);
            } else {
                return response()->json([
                    "message" => "Manager Token Not Found"
                ], 404);
            }

        }


    }


    public function loginMember(Request $request)
    {

        if ($request->headers->get('Accept') == 'application/json' && $request->headers->get('X-API-KEY') == 'smartmeal' && $request->headers->get('X-API-SECRET') == '8821') {


            $phone = $request->get('phone');
            $password = $request->get('password');

            $users = Members::where('phone', $phone)->where('password', $password)->first();

            if ($users != null) {
                $data = [
                    'id' => (integer)$users['id'],
                    'username' => (string)$users['username'],
                    'email' => (string)$users['email'],
                    'phone' => (string)$users['phone'],
                    'check_meal' => (bool)$users['check_meal'],
                    'manager_unique_token' => (string)$users['manager_unique_token'],
                ];
                return $data;
            } else {
                return new JsonResponse([
                    'message' => 'Phone number or password not match',
                    'status' => 404
                ]);
            }

        } else {
            return new JsonResponse([
                'message' => 'Invalied request',
                'status' => 500
            ]);
        }

    }


    public function InsertMeal(Request $request)
    {


        $manager_token = $request->get('manager_unique_id');
        $date = $request->get('date');
        $data = $request->get('meal');
        $data = json_decode($data, true);

        $meals = [
            "manager_token" => $manager_token,
            "meal" => $data

        ];


        foreach ($meals['meal'] as $meal) {

            $allmeal = new AllMeal();
            $allmeal->manager_unique_id = $manager_token;
            $allmeal->date = $date;
            $allmeal->user_id = $meal['user_id'];
            $allmeal->breakfast = $meal['breakfast'];
            $allmeal->lunch = $meal['lunch'];
            $allmeal->dinner = $meal['dinner'];
            $allmeal->save();

        }

        //Check if user was created
        if (!$allmeal->save()) {
            return new JsonResponse([
                'message' => 'Insert Failed',
                'status' => 500
            ]);
        } else {
            return new JsonResponse([
                'message' => 'Success',
                'status' => 201
            ]);
        }


    }


    public function GetAllMeal(Request $request)
    {

        $id = $request->get('id');


        try {

            $product_details = MainUsers::with(array('Mymeals' => function ($query) {
                $query->select('id', 'user_id', 'breakfast', 'lunch', 'dinner', 'date');
            }))->where('id', '=', $id)->get();

            $returnArray = [];
            foreach ($product_details as $product_detail) {

                $arrayMeal = [];
                if ($product_detail['mymeals']) {
                    foreach ($product_detail['mymeals'] as $item) {
                        $arrayMeal[] = [
                            'id' => $item['id'],
                            'user_id' => $item['user_id'],
                            'breakfast' => $item['breakfast'],
                            'lunch' => $item['lunch'],
                            'dinner' => $item['dinner'],
                            'date' => $item['date'],
                        ];
                    }
                }


                $returnArray = array(
                    'id' => $product_detail['id'],
                    'manager' => $product_detail['username'],
                    'meals' => $arrayMeal ? $arrayMeal : "null",
                );
            }

            // $all_brand = Product::select('name','category_id','slug')->where('slug', "t_shirt")->get();
            return \response(
                $returnArray
            );
            // response()->json($comments);

        } catch (Exception $ex) {
            return \response([
                'message' => $ex->getMessage()
            ]);
        }
    }


    public function GetTotalMeal(Request $request)
    {

        $id = $request->get('id');

        // $sum = AllMeal::where('manager_unique_id', $id)->sum('breakfast' , '+' , 'lunch' , '+', 'dinner');
        $users = DB::table('all_meal')
            ->select(DB::raw('SUM(breakfast+lunch+dinner) as totalmeal'))
            ->where('manager_unique_id', $id)
            ->get();


        return new JsonResponse($users);

    }

    public function GetUserMeal(Request $request)
    {

        $id = $request->get('id');
        $date = $request->get('date');

        // $sum = AllMeal::where('manager_unique_id', $id)->sum('breakfast' , '+' , 'lunch' , '+', 'dinner');
        $users = DB::table('all_meal')
            ->select(DB::raw('SUM(breakfast+lunch+dinner) as totalmeal'))
            ->where('user_id', $id)
            ->where('date', 'like', '%' . $date . '%')
            ->get();


        return new JsonResponse($users);
    }

    public function GetTotalMember(Request $request)
    {

        $token = $request->get('admin_unique_token');

        // $sum = AllMeal::where('manager_unique_id', $id)->sum('breakfast' , '+' , 'lunch' , '+', 'dinner');
        $users = DB::table('members')
            ->select(DB::raw('count(manager_unique_token) as totalmember'))
            ->where('manager_unique_token', $token)
            ->get();


        return new JsonResponse($users);

    }

}
