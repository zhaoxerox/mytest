<?php

namespace App\Http\Controllers;

use App\Models\TableTest;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $id1 = $request->post('id1');
        $id2 = $request->post('id2');

        if ( empty($id1)  ){
            return response()->horesp(400, [], 'id1 is empty');
        }

        if ( empty($id2)  ){
            return response()->horesp(400, [], 'id2 is empty');
        }

        $tableTestModel = new TableTest();
        $info = $tableTestModel->where(['id1'=>$id1,'id2'=>$id2])->first();
        if ( empty($info) ){
            $uuid = Uuid::uuid4()->toString();

            $tableTestModel->id1 = $id1;
            $tableTestModel->id2 = $id2;
            $tableTestModel->userID = $uuid;
            if ( !$tableTestModel->save() ){
                return response()->horesp(400, [], 'update database fail');
            }
        }else{
            $uuid = $info->userID;
        }

        return response()->horesp(200, ['id1'=>$id1,'id2'=>$id2,'userID'=>$uuid], 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
