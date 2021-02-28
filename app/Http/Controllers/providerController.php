<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffModel;
use Ixudra\Curl\Facades\Curl;

class providerController extends Controller
{
    public function get_staff() {
        return response()->json(StaffModel::all(), 200);
    }

    public function get_provider_price_credit($prefix) {
        $response = Curl::to('https://api.bukalapak.com/phone-credits/prepaid-products?prefix='.$prefix.'&category=topup&status[]=available&status[]=unavailable&access_token='.config('constant.myTokenBL'))
            ->withHeader('Connection: keep-alive')
            ->withHeader('sec-ch-ua: "Chromium";v="88", "Google Chrome";v="88", ";Not A Brand";v="99"')
            ->withHeader('Accept: application/json, text/plain, */*')
            ->withHeader('sec-ch-ua-mobile: ?0')
            ->withHeader('User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36')
            ->withHeader('Content-Type: application/json;charset=utf-8')
            ->withHeader('Origin: https://www.bukalapak.com')
            ->withHeader('Sec-Fetch-Site: same-site')
            ->withHeader('Sec-Fetch-Mode: cors')
            ->withHeader('Sec-Fetch-Dest: empty')
            ->withHeader('Referer: https://www.bukalapak.com/')
            ->withHeader('Accept-Language: en-US,en;q=0.9,id;q=0.8')
            ->withHeader('Set-Cookie: __cfduid=d03522f5ed0551e5e7a50da4c363a92ef1613377532; expires=Wed, 17-Mar-21 08:25:32 GMT; path=/; domain=.api.bukalapak.com; HttpOnly; SameSite=Lax')
            ->get();

        return response()->json(json_decode($response), 200);
    }

    public function get_provider_price_data($prefix) {
        $response = Curl::to('https://api.bukalapak.com/phone-credits/prepaid-products?category=package&prefix='.$prefix.'&status[]=available&status[]=unavailable&access_token='.config('constant.myTokenBL'))
            ->withHeader('Connection: keep-alive')
            ->withHeader('sec-ch-ua: "Chromium";v="88", "Google Chrome";v="88", ";Not A Brand";v="99"')
            ->withHeader('Accept: application/json, text/plain, */*')
            ->withHeader('sec-ch-ua-mobile: ?0')
            ->withHeader('User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36')
            ->withHeader('Content-Type: application/json;charset=utf-8')
            ->withHeader('Origin: https://www.bukalapak.com')
            ->withHeader('Sec-Fetch-Site: same-site')
            ->withHeader('Sec-Fetch-Mode: cors')
            ->withHeader('Sec-Fetch-Dest: empty')
            ->withHeader('Referer: https://www.bukalapak.com/')
            ->withHeader('Accept-Language: en-US,en;q=0.9,id;q=0.8')
            ->withHeader('Cookie: '.config('constant.myCookie'))
            ->get();

        return response()->json(json_decode($response), 200);
    }

    public function get_freefire_price() {
        $response = Curl::to('https://api.bukalapak.com/wallet/api/alipayplus.mobilewallet.product.load.json?ctoken='.config('constant.myTokenDana'))
            ->withHeader('Connection: keep-alive')
            ->withHeader('Content-Length: 32')
            ->withHeader('sec-ch-ua: "Chromium";v="88", "Google Chrome";v="88", ";Not A Brand";v="99"')
            ->withHeader('X-Rds: 083YlF/THhLek5+SHpPdEB2TRI=|YVF/JgZHLV0wXzgYNhYsFjYYOG0GagxhFGVFGkU=|YFF/JhQ6CCYVJBIpBzMHNhgrGi4aNAE1DyESIxcjDTgMNmk2|Z1RnSRAwWixaKFlhTGEOIkQnSygEbwkkS2YDYA9oGSRDL1kpUgBtBmocI0MzXitaPU1tQ2MJfwl7CjIfMkcyR2sOYw5rBWJOL0ItACB/IA==|ZlVlSydQPlAP|ZV9xUTdUOFsGdhF0KVg/SRtuCFVlV2RfbV5uXW1cb1ppXwI0AzIHPR1C|ZFJ8JQUlCz8ENhgpHSsFPws5Zjk=|a1xyKwsrBVxrWmBOeE54Jwk7FTUVOwg8Bj1iPQ==|all3Rmhdc0BzSWdUYlB+SXJcb11zQHol')
            ->withHeader('X-Apdid-Token: GZ00DF413677E93541F9B20CE736411100E3aphomeGZ00')
            ->withHeader('sec-ch-ua-mobile: ?0')
            ->withHeader('User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36')
            ->withHeader('Content-Type: application/json')
            ->withHeader('X-Fe-Version: 1.80.0')
            ->withHeader('X-GAME: true')
            ->withHeader('X-Fe-Request-Id: 0000000016136240814230010')
            ->withHeader('Accept: */*')
            ->withHeader('Origin: https://m.dana.id')
            ->withHeader('Accept: */*')
            ->withHeader('Sec-Fetch-Site: same-origin')
            ->withHeader('Sec-Fetch-Mode: cors')
            ->withHeader('Sec-Fetch-Dest: empty')
            ->withHeader('Referer: https://m.dana.id/m/game/free_fire/package?entryPoint=browser&providerName=Free%2520Fire')
            ->withHeader('Accept-Language: en-US,en;q=0.9')
            ->withHeader('Accept-Encoding: gzip, deflate, br')
            ->withHeader('Cookie: '.config('constant.myCookieDana'))
            ->withData(array('productCode' => 'GAME_FREE_FIRE'))
            ->post();

        return response()->json(json_decode($response), 200);
    }
}
