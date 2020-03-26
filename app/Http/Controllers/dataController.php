<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\data;
use DB;
use Nexmo\Laravel\Facade\Nexmo;
use Session;
use input;

class dataController extends Controller
{
    public function data()
    {
$obj = data::all();
//dd($obj);
return view('ajax',['obj' => $obj]);
    }

     function index()
    {
     $country_list = DB::table('country_state_cities')
         //->groupBy('country')

         ->get();
         //dd($country_list);
     return view('dynamic_dependent')->with('country_list', $country_list);
    }

    function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('country_state_cities')
       ->where($select, $value)
       //->select('state')
       //dd($data);
       //->groupBy($dependent)
       ->get();

       //console.log($data);
       //dd($data);
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
       
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        //$o .= '<li>'.$row->$dependent.'</li>';
        //$output .= '<li>'.$row->$dependent.'</li>';
     }
     //$output .= '<li>'.$row->$dependent.'</li>';
     //echo $output;

     //$o = '<li>'.ucfirst($dependent).'</li>';
     if ($select=="id") {
        $value = $request->get('value');
      $dependent = $request->get('dependent');
      $data = DB::table('sides')
      ->join('country_state_cities', 'sides.id', '=', 'country_state_cities.id')
      ->where('sides.id','=', $value)
            ->select('sides.*')
        
 //       //->groupBy($dependent)
       ->get();
       // **********fetching
       // DB::table('users')
       //  ->join('contacts', function ($join) {
       //      $join->on('users.id', '=', 'contacts.user_id')
       //           ->where('contacts.user_id', '>', 5);
       //  })
       //  ->get();
       // **********fetching
 //       //dd($data);
      $o = '<li>ID:'.ucfirst($value).'</li>';
  foreach($data as $row)
     {
 //      //$output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
         //$o .= '<li>'.$row->$dependent.'</li>';
         $o .= '
<tr>
         <td>'.$row->city.'</td>
         </tr>
         <tr>
         <td>'.$row->address.'</td>
         </tr>
         <tr>
         <td>'.$row->persons.'</td>
         </tr>';
     }
 //     //$output .= '<li>'.$row->$dependent.'</li>';
$data = array(
  'table_data' => $o,

);

      echo json_encode($o);

 //        //$o .= '<li>'.$row->$dependent.'</li>';
 //        //echo $o;
      }

     else
     {
        echo json_encode($output);
     }
     

     // if ($row->$dependent=="andorkilla") {
     //     $o .= '<li>'.$row->$dependent.'</li>';
     //     echo $o;
     // }
     
     //echo $o;
    }

    public function fet(Request $request)
    {
      if ($request->get('str')) {
        $value = $request->get('str');
      //$dependent = $request->get('dependent');
      $data = DB::table('sides')
      ->join('country_state_cities', 'sides.id', '=', 'country_state_cities.id')
      ->where('sides.id','=', $value)
            ->select('sides.*')
        
 //       //->groupBy($dependent)
       ->get();
       // **********fetching
       // DB::table('users')
       //  ->join('contacts', function ($join) {
       //      $join->on('users.id', '=', 'contacts.user_id')
       //           ->where('contacts.user_id', '>', 5);
       //  })
       //  ->get();
       // **********fetching
 //       //dd($data);
      $o = '<li>'.ucfirst($dependent).'</li>';
  foreach($data as $row)
     {
 //      //$output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
         //$o .= '<li>'.$row->$dependent.'</li>';
         $o .= '
<tr>
         <td>'.$row->city.'</td>
         </tr>
         <tr>
         <td>'.$row->address.'</td>
         </tr>
         <tr>
         <td>'.$row->persons.'</td>
         </tr>';
     }
 //     //$output .= '<li>'.$row->$dependent.'</li>';
$data = array(
  'table_data' => $o,

);

      echo json_encode($o);

 //        //$o .= '<li>'.$row->$dependent.'</li>';
 //        //echo $o;
      }

     else
     {
        return fetch();
     }
     
    }

    public function sms(Request $request)
    {
      Nexmo::message()->send([
    'to'   => '+88'.$request->phonenumber,
    'from' => '+8801627962866',
    'message_uuid' => 'aaaaaaaa-bbbb-cccc-dddd-0123456789ab',
    'text' => $request->message
]);
     return redirect()->back()->with('message', 'Sent successfully!');
    }

    public function sent(Request $request)
    {
      //curl -X POST  https:rest.nexmo.com/sms/json \
$message = $request->message;
$mobile = $request->input('phonenumber');
//$mobile1 = $request->input('phonenumber1');
$encodeMessage = urlencode($message);
$authkey = '11a8b14d';
$senderId = 'DYCPOKZvSUkVOr0F';
$route = 4;
//$postData = $mobile;
//$mobileNumber = implode($postData['phonenumber']);

$arr = str_split($mobile,'14');

$mobiles = implode(",", $arr);

$data = array(
  'api_key' => $authkey,
  'mobiles' => $mobiles,
  'message' => $encodeMessage,
  'api_secret' => $senderId,
  'route' => $route,
);

      $url = "https://www.nexmo.com/";
      $ch = curl_init();
      curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $mobile
      ));
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      $output = curl_exec($ch);

      if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
      }
      curl_close($ch);
      return redirect()->back()->with('message', 'Sent successfully!');
    }
}
