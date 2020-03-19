<?php

namespace App\Http\Controllers;

use App\Models\TestModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    //
    public function getAllTest()
    {
        $result = TestModel::all();
        if (isset($result)) {
            $res = response()->json(ApiResponse::ok("success", $result));
        } else {
            $res = response()->json(ApiResponse::notFound(), 404);
        }
        // return Response()->json($result);

        return $res;
    }

    public function getTestById($id)
    {
        $result = TestModel::find($id);
        // return Response()->json($result);
        if ($result) {
            $res = response()->json(ApiResponse::ok("success", $result));
        } else {
            $res = response()->json(ApiResponse::notFound(), 404);
        }
        return $res;
    }

    public function insertTest(Request $request)
    {
        //cara pertama
        $test = new TestModel;
        $test->nama_test = $request->nama_test;
        $test->nomor_test = $request->nomor_test;
        $test->nilai = $request->nilai;

        try {
            $result = $test->save();
        } catch (Exception $e) {
            $result = false;
        }

        if ($result) {
            $res = response()->json(ApiResponse::created("data saved", []), 201);
        } else {
            $res = response()->json(ApiResponse::notAcceptable(), 406);
        }

        return $res;

        // return Response()->json($test->isClean());
        // return Response()->json($a);

        //cara ke 2 harus membuat variable $fillabel di model
        // $uu = TestModel::create($request->all());
        // return response()->json($uu);
    }

    public function updateTest(Request $req, $id)
    {
        $test = TestModel::find($id);
        $test->nama_test = $req->nama_test;
        $test->nomor_test = $req->nomor_test;
        $test->nilai = $req->nilai;

        try {
            $result = $test->save();
        } catch (Exception $e) {
            $result = false;
        }

        if ($result) {
            $res = response()->json(ApiResponse::saved("data saved", []), 201);
        } else {
            $res = response()->json(ApiResponse::notAcceptable(), 406);
        }

        return $res;
    }

    public function deleteTest($id)
    {
        $test = TestModel::find($id);

        if (isset($test)) {
            try {
                $result = $test->delete();
            } catch (Exception $e) {
                $result = false;
            }
        } else {
            $result = false;
        }


        if ($result) {
            $res = response()->json(ApiResponse::created("deleted", []), 201);
        } else {
            $res = response()->json(ApiResponse::notAcceptable(), 406);
        }

        return $res;
    }
}
