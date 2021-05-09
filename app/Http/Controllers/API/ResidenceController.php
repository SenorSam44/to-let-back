<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResidenceStoreRequest;
use App\Models\Residence;
use App\Models\Room;
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
        $validated= $request->validated();
        $validated['owner_id'] = $request->user()->id;
        $residence = Residence::create($validated);

        $rooms = json_decode(json_encode($request->room_details), true);
        foreach($rooms as $room){
            Room::create([
                'residence_id' => $residence->id,
                'type' => $room['room_type'],
                'attached_bathroom' => $room['attached_bathroom'],
                'attached_balcony' => $room['attached_balconies'],
            ]);
        }

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
