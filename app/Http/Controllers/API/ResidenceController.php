<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResidenceStoreRequest;
use App\Models\Residence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResidenceController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Residence::all());
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
     * @param ResidenceStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(ResidenceStoreRequest $request)
    {
        $validated = $request->validated();
//        if (auth('api')->id() != null) {
//            error_log("if 1");
//            $user_id = auth('api')->id();
//        } elseif (Auth::id() != null) {
//            error_log("if 2");
//            $user_id = Auth::id();
//        } elseif (isset($request->user()->id) && $request->user()->id != null) {
//            error_log("if 3");
//            $user_id = $request->user()->id;
//        }else{
//            $user_id = 1009;
//        }
        $validated['owner_id'] = auth('api')->id();
        Residence::create($validated);

        return response()->json($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
