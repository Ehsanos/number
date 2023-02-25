<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Enums\OrderStatusEnum;
use App\Models\Setting;
class OnlineController extends Controller
{
    protected $base_url = 'http://192.168.31.66:8000/api/v1/';
protected $token='';
protected $ratio='';
protected $logo='';
protected $facebook='';
protected $phone='';
protected $address='';
protected $website_name='';


public function __construct(){
    $setting=Setting::first();
    $this->token=$setting->api_key??'2|k2SrzsBdM6QBOe06i5wpNi7CsSSCBbU3j5mcRiia';
    $this->ratio=$setting->profit_rate??0.1;
    $this->logo=$setting->img();

}


    public function index()
    {
        $servers = collect([]);
        $response = Http::withToken($this->token)->get($this->base_url . 'servers');
        if ($response->successful() && $response->json('status') == 'success') {
//dd($response->json());
            $servers = collect($response->json('servers'));
        }
        return view('site.pages.server', compact('servers'));
    }


    public function countries($server)
    {
        $countries = [];
        $response = Http::withToken($this->token)->get($this->base_url . 'servers');
        if ($response->successful() && $response->json('status') == 'success') {

            $servers = collect($response->json('servers'));
            foreach ($servers as $item) {
                if ($item['id'] == $server) {
                    $countries = $item['countries'];
                    break;
                }
            }
        }
        return view('site.pages.country', compact('countries', 'server'));
    }





    public function apps($server, $country)
    {


        $apps = [];
        $response = Http::withToken($this->token)->get($this->base_url . 'servers');
        if ($response->successful() && $response->json('status') == 'success') {

            $servers = collect($response->json('servers'));
            foreach ($servers as $item) {
                if ($item['id'] == $server) {
                    $apps = $item['programs'];
                    break;
                }
            }
        }
        return view('site.pages.apps', compact('apps', 'server','country'));
    }




    public function pay(Request $request)
    {
        $this->validate($request,[
            'serverapi'=>'required',
            'country'=>'required',
            'app'=>'required'
        ]);

        $server=$request->serverapi;
        $country=$request->country;
        $app=$request->app;


        $apps = [];
        $response = Http::withToken($this->token)->get($this->base_url . 'servers');
        if ($response->successful() && $response->json('status') == 'success') {

            $servers = collect($response->json('servers'));
            foreach ($servers as $item) {

                if ($item['id'] == $server) {
                    $apps = $item['programs'];
                    foreach ($apps as $program){
                        $price=($program['price']+($program['price']*$this->ratio));
                        if(auth()->user()->total_balance>=$price){
                            $response2=Http::withToken('')->get("/orders/$server/$country/$apps");
                            if($response2->successful() && $response2->json('status')=='success'){
                               DB::beginTransaction();
                               try{
                                   auth()->user()->orders()->create([
                                       'status'=>OrderStatusEnum::Wait,
                                       'price'=>$price,
                                       'api_id'=>$response2->json('order')['id'],
                                       'info'=>$response2->json('order')['info'],
                                       'phone'=>$response2->json('order')['phone']
                                   ]);
                                   auth()->user()->balances()->create([
                                       'debit'=>$price,
                                       'credit'=>0,
                                       'total'=>auth()->user()->total_balance-$price,
                                       'info'=>'قيمة شراء رقم '.$program['name'],
                                   ]);
                                   DB::commit();
                                   return redirect()->route('servers');
                               }catch(Exception $e){
                                   DB::rollBack();
                                   return redirect()->back()->with('error',$e->getMessage());
                               }
                            }else{
                                return redirect()->back()->with('error',$response2->json('msg'));
                            }
                        }else{
                            return redirect()->back()->with('error','لا تملك رصيد كافي');
                        }
                    }




                }
            }
        }
        return view('site.pages.apps', compact('apps', 'server','country'));
    }
}
