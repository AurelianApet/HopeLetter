<?php

namespace App\Http\Controllers\Api;


use App\Request as RequestModel;
use App\Street as StreetModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RequestController extends Controller
{
    public function create(Request $request)
    {
        $tel = $request->get('tel');
        $requests = RequestModel::where('address', $tel)->get();
        if (count($requests) > 0) {
            return response()->json([
                'result' => 'FAIL',
                'msg' => '이미 신청되었습니다.'
            ]);
        }

        $sido = $request->get('sido');
        $street = StreetModel::where('name', $sido)->get();
        if (count($street) > 0) {
            $street = $street[0];
        } else {
            $street = new StreetModel([
                'name' => $sido
            ]);
            $street->save();
        }

        $request = new RequestModel([
            'name' => $request->get('name'),
            'street_id' => $street->id,
            'school' => $request->get('school'),
            'class' => $request->get('class'),
            'year' => $request->get('unit'),
            'address' => $tel
        ]);

        $request->save();
        return response()->json([
            'result' => 'SUCCESS'
        ]);
    }

}
