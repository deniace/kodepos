<?php

namespace App\Http\Controllers;

use App\Models\ProvinsiModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
// use Psr\Http\Message\ServerRequestInterface;
// use Psr\Http\Message\ServerRequestInterface as Request;

// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;

class ProvinsiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        // return "ini dari controller";
    }

    // public function (Request $req){}

    public function test($id)
    {
        $result = DB::table('db_province_data')->where('province_code', $id)->get();
        return json_encode($result);
    }

    // public function coba(Request $request)
    // {
    //     // return $response->getBody("TUTU");
    //     $result = DB::table('db_province_data')->first();
    //     // $result = DB::table('db_province_data')->get();
    //     // $list = $result->fetchAll();
    //     // return $response->json($result);
    //     // return $res;
    //     // $response->__toString();
    //     $name = $request->input("name");
    //     return $name;
    // }

    public function cobaMethod(Request $req)
    {
        $method = $req->method();
        return $method;
    }

    public function cobaGetGroup(Request $req)
    {
        $method = $req->method();
        return "ini dari " . $method . " group";
    }

    public function cobaPostGroup(Request $req, Response $res)
    {
        $input = $req->all();
        $name = $req->input();
        return response()->json($name);
    }

    public function cobaPutGroup(Request $req)
    {
        $method = $req->method();
        return "group " . $method;
    }

    public function cobaDeleteGroup(Request $req)
    {
        $method = $req->method();
        return "group " . $method;
    }


    public function getAllProvinsi()
    {
        $result = DB::select("select * from db_province_data");
        return ['data' => $result];
    }

    public function cobaDbBuilder()
    {
        $result = DB::table('db_province_data')->get();
        return $result;
    }

    public function getAllProvinsiM()
    {
        $provinsin = ProvinsiModel::all();
        return Response()->json($provinsin, 200);
    }

    public function getProvinsi($id)
    {
        $provinsin = ProvinsiModel::findOrFail($id);
        return Response()->json($provinsin);
    }
}
