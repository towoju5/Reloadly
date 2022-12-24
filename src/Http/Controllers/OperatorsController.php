<?php 

namespace Towoju5\Reloadly\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Towoju5\Reloadly\Models\Operators;
use Towoju5\Reloadly\Reloadly;

class OperatorsController extends Controller
{
    // get all operators from Reloadly.
    public function sync()
    {
        $url = 'https://topups-sandbox.reloadly.com/operators';
        $req = Reloadly::send_request($url, "GET", [], Reloadly::getToken());
        $res = json_decode($req, true);
        // return $res;
        $this->saveOperators($res);
        return response()->json(['msg' => "Saved successfully", "data" => $req]);
    }

    /**
     * Save all operators to database to make usage and calling faster
     */
    public function saveOperators($arr)
    {
        // $arr = json_decode($datas, true);
        foreach($arr['content'] as $data):
            Operators::create([
                "operatorId"                    =>  $data["operatorId"],
                "name"                          =>  $data["name"],
                "bundle"                        =>  $data["bundle"],
                "data"                          =>  $data["data"],
                "pin"                           =>  $data["pin"],
                "supportsLocalAmounts"          =>  $data["supportsLocalAmounts"],
                "denominationType"              =>  $data["denominationType"],
                "senderCurrencyCode"            =>  $data["senderCurrencyCode"],
                "senderCurrencySymbol"          =>  $data["senderCurrencySymbol"],
                "destinationCurrencyCode"       =>  $data["destinationCurrencyCode"],
                "destinationCurrencySymbol"     =>  $data["destinationCurrencySymbol"],
                "commission"                    =>  $data["commission"],
                "internationalDiscount"         =>  $data["internationalDiscount"],
                "localDiscount"                 =>  $data["localDiscount"],
                "mostPopularAmount"             =>  $data["mostPopularAmount"],
                "minAmount"                     =>  $data["minAmount"],
                "maxAmount"                     =>  $data["maxAmount"],
                "localMinAmount"                =>  $data["localMinAmount"],
                "localMaxAmount"                =>  $data["localMaxAmount"],
                "country"                       =>  $data["country"],
                "fx"                            =>  $data["fx"],
                "logoUrls"                      =>  $data["logoUrls"],
                "fixedAmounts"                  =>  $data["fixedAmounts"],
                "fixedAmountsDescriptions"      =>  $data["fixedAmountsDescriptions"],
                "localFixedAmounts"             =>  $data["localFixedAmounts"],
                "localFixedAmountsDescriptions" =>  $data["localFixedAmountsDescriptions"],
                "suggestedAmounts"              =>  $data["suggestedAmounts"],
                "suggestedAmountsMap"           =>  $data["suggestedAmountsMap"],
                "promotions"                    =>  $data["promotions"] ?? "[]",
            ]);
        endforeach;
    }
}
