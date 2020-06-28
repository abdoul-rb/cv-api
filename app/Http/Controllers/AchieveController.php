<?php

namespace App\Http\Controllers;

use App\Http\Requests\Achieve\StoreAchieveFormRequest;
use App\Http\Resources\AchieveResource;
use App\Model\Achieve;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AchieveController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /achieves/
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $achieves = Achieve::all();

        return AchieveResource::collection($achieves);
    }

    /**
     * Store a newly created resource in storage.
     * POST /achieves
     *
     * @param StoreAchieveFormRequest $request
     * @return void
     */
    public function store(StoreAchieveFormRequest $request)
    {
        Achieve::create(
            $request->only('name', 'url', 'description', 'technos')
        );
    }

    /**
     * Display the specified resource.
     * GET /achieves/{achieve}
     *
     * @param Achieve $achieve
     * @return AchieveResource
     */
    public function show(Achieve $achieve)
    {
        return new AchieveResource($achieve);
    }

    /**
     * Update the specified resource in storage.
     * PUT /achieves/{achieve}
     *
     * @param UpdateAchieveFormRequest $request
     * @param Achieve $achieve
     * @return void
     */
    public function update(UpdateAchieveFormRequest $request, Achieve $achieve)
    {
        $achieve->update(
            $request->only('name', 'url', 'description', 'technos')
        );
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /achieves/{achieve}
     *
     * @param Achieve $achieve
     * @return void
     * @throws \Exception
     */
    public function destroy(Achieve $achieve)
    {
        $achieve->delete();
    }
}
