<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Constant;
use App\Helpers\Functions;
use App\Http\Requests\Admin\Home\DeleteMediaRequest;
use App\Models\Coin;
use App\Models\User;

//use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class HomeController extends Controller
{

    /**
     * @return Factory|View
     */
    public function index()
    {

        return view('AhmedPanel.home');
    }

    public function coin()
    {
        $date = date('Y-m-d');
        $req_url = "https://api.exchangerate.host/{$date}?base=USD";
        $response_json = file_get_contents($req_url);
        if (false !== $response_json) {
            try {
                $response = json_decode($response_json);
                if ($response->success === true) {
                    foreach ($response->rates as $coin => $value) {
                        Coin::where('coin_code', '=', $coin)->update(['price' => $value, 'time' => date('H:i:s')]);
                    }
                }
            } catch (\Exception $e) {
                // Handle JSON parse error...
            }
        }
    }

    public function lang($lang = 'en')
    {
        session(['my_locale' => $lang]);
        App::setLocale(session('my_locale'));
        return redirect()->back();
    }

    public function general_notification(Request $request)
    {
        $Title = $request->has('title') ? $request->title : '';
        $Message = $request->has('msg') ? $request->msg : '';
        $Users = new User();
        if ($request->has('type') && $request->type == 1)
            $Users = $Users->where('type', 1);
        if ($request->has('type') && $request->type == 2)
            $Users = $Users->where('type', 2);
        $Users = $Users->whereNotNull('device_token')->get();
        Functions::sendNotifications($Users, $Title, $Message, null, Constant::NOTIFICATION_TYPE['General']);
        return redirect()->back()->with('status', __('admin.messages.notification_sent'));
    }

    public function delete_media(DeleteMediaRequest $request)
    {
        return $request->preset();
    }
}
