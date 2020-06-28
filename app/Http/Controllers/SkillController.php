<?php

namespace App\Http\Controllers;

use App\Http\Requests\Skill\StoreSkillFormRequest;
use App\Http\Requests\Skill\UpdateSkillFormRequest;
use App\Http\Resources\SkillResource;
use App\Model\Skill;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /skills
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $skills = Skill::all();
        return SkillResource::collection($skills);
    }


    /**
     * Store a newly created resource in storage.
     * POST /skills
     *
     * @param StoreSkillFormRequest $request
     * @return void
     */
    public function store(StoreSkillFormRequest $request)
    {
        Skill::create(
            $request->only('name','category')
        );
    }

    /**
     * Display the specified resource.
     * GET /skills/{skill}
     *
     * @param Skill $skill
     * @return SkillResource
     */
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }


    /**
     * Update the specified resource in storage.
     * PUT /skills/{skill}
     *
     * @param UpdateSkillFormRequest $request
     * @param Skill $skill
     * @return void
     */
    public function update(UpdateSkillFormRequest $request, Skill $skill)
    {
        $skill->update(
            $request->only('name', 'category')
        );
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /skills/{skill}
     *
     * @param Skill $skill
     * @return void
     * @throws Exception
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
    }
}
