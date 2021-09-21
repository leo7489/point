<?php

namespace App\Http\Controllers;

use App\Point;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all users
        $all_users = array();
        $users = DB::table('users')
                ->select('id', 'name')
                ->get();

        $users = json_decode($users);
        $today = date("Y-m-d"); 

        if(count($users)>0){
            foreach($users as $user){
                //find each user's total points
                $points = DB::table('points')
                ->where('user_id', '=', $user->id)
                ->whereTime('expire_at', '>', $today)
                ->sum('amount');       
              
                $temp = array(
                    "user_id"=>$user->id,
                    "name"=>$user->name,
                    "total_points"=> $points,
                );
                array_push($all_users, $temp);
            }
        }

        return view('welcome', ['users' => $all_users]);
    }

    public function add_points(){
        $user_id = $_POST['user_id'];
        // print_r($user_id);
        return view('add_points', ['user_id' => $user_id] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = $_POST['user_id'];
        // print_r($user_id);
        $point_a = $_POST['pointa'];
        $point_b = $_POST['pointb'];
        $point_c = $_POST['pointc'];
        $point_d = $_POST['pointd'];
        $point_e = $_POST['pointe'];
        $point_f = $_POST['pointf'];
        $total_points = $point_a + $point_b + $point_c + 
                        $point_d + $point_e + $point_f;
        
        $total_points = $this->check_total_number($total_points);                
        
        $three_month_later = strtotime("+3 month");
        $expire_at = date("Y-m-d H:i:s", $three_month_later);
        
        $report = DB::table('points')->insert(
            ['user_id' => $user_id, 
             'amount' => $total_points,
             'expire_at'=> $expire_at,
            ]
        );
        $result = true;
        if($report != 1){
            $result = false;
        }
        return view('report', ['total_points'=>$total_points, 'result'=>$result ] );
    }

    public function check_total_number($num){
        if($num>=500){
            return 500;
        }else{
            return $num;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Point  $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
}
