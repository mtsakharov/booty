<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformationController extends Controller
{
    /**
     * @return Information[]|Collection
     */
    public function index()
    {
        return Information::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        return Information::create([
            'race' => $request->race,
            'age' => $request->age,
            'user_id' => auth()->user()->id,
            'boobs_size' => $request->boobs_size,
            'hair_color' => $request->hair_color,
            'height' => $request->height,
            'weight' => $request->weight,
            'gender' => $request->gender,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Builder[]|Collection|Response
     */
    public function show($id)
    {
        $information = Information::findOrFail($id);

        return $information->with('user')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Information  $information
     * @return bool
     */
    public function update(Request $request, $id)
    {
        $information = Information::findOrFail($id);

        $information->update([
            'race' => $request->race,
            'age' => $request->age,
            'user_id' => auth()->user()->id,
            'boobs_size' => $request->boobs_size,
            'hair_color' => $request->hair_color,
            'height' => $request->height,
            'weight' => $request->weight,
            'gender' => $request->gender,
        ]);

        return $information;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return array
     */
    public function destroy($id)
    {
        $information = Information::findOrFail($id);

        $information->delete();

        return ['status' => 'deleted'];
    }

    public function getAllUsersWithActiveWork()
    {
        return Information::all()->where('type', '=', 1)->get();
    }
}
