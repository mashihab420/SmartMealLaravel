<?php

namespace App\Http\Controllers;

use App\Models\AllMeal;
use App\Models\MainUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    //

    public function createManager()
    {
        return view('home', ['name' => "My name is shihab"]);
    }


    public function editManager($id)
    {

        $users = MainUsers::findorFail($id);

        return view('edit',['users'=>$users]);
    }

    public function crud()
    {
        $users = DB::table('mainusers')->get();

        return view('crud',['users'=>$users]);
    }

    public function storeManager(Request $request)
    {



        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'token' => 'required',

        ],
            [
                'username.required' => 'Name Field is Required',
                'email.required' => 'Email Field is Required',
                'phone.required' => 'Phone Field is Required',
                'password.required' => 'Password Field is Required',
                'token.required' => 'Token Field is Required',
            ]
        );



        $mealstatus =  $request->get('checkmeal');

        $previous =  $request->get('previsoumanager');

       /* $manager = MainUsers::where('id', '=' , $previous)->select('username')->get();
*/

        $mainusers = new MainUsers();
        $mainusers->username = $request->get('username');
        $mainusers->email = $request->get('email');
        $mainusers->phone = $request->get('phone');
        $mainusers->password = $request->get('password');
        $mainusers->admin_unique_token = $request->get('token');
        if ($mealstatus == null){
            $mainusers->check_meal = 0;
        }else{
            $mainusers->check_meal = 1;
        }

        $mainusers->save();

        return redirect()->back()->with('success', 'Account Create Successfully');
    }

    public function managerUpdate(Request $request,$id)
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'token' => 'required',

        ],
            [
                'username.required' => 'Name Field is Required',
                'email.required' => 'Email Field is Required',
                'phone.required' => 'Phone Field is Required',
                'token.required' => 'Token Field is Required',
            ]
        );


        MainUsers::findorFail($id)->update([
           'username'=>$request->username,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'token'=>$request->token,
        ]);


        return redirect()->to('/crud')->with('update', 'Update Successfully');
    }

    public function managerDelete($id)
    {


        MainUsers::findorFail($id)->delete();


        return redirect()->to('/crud')->with('delete', 'Delete Successfully');
    }

    public function searchManager()
    {


        $search_text = $_GET['query'];
        $managers = MainUsers::where('username','LIKE', '%'.$search_text.'%')->get();

        return view('search',['managers'=>$managers]);
    }
}
