<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        Information::create([
            'race' => $request->race,
            'age' => $request->age,
            'user_id' => auth()->user()->id,
            'boobs_size' => $request->boobs_size,
            'hair_color' => $request->hair_color,
            'height' => $request->height,
            'weight' => $request->weight,
            'gender' => $request->gender,
        ]);

        return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  Information  $information
     * @return Builder[]|Collection|Response
     */
    public function show(Information $information)
    {
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
        $information = Information::find($id);

        $information->update(
            [
                'race' => $request->race,
                'age' => $request->age,
                'user_id' => auth()->user()->id,
                'boobs_size' => $request->boobs_size,
                'hair_color' => $request->hair_color,
                'height' => $request->height,
                'weight' => $request->weight,
                'gender' => $request->gender,
            ]
        );

        return $information;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Information  $information
     * @return string
     */
    public function destroy(Information $information)
    {
        $information->delete();

        return 'ok';
    }
}
