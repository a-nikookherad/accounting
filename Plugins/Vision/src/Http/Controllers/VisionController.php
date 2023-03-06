<?php

namespace Vision\Http\Controllers;

use App\Tools\HttpResponses;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Vision\Entities\Models\Vision;
use Vision\Entities\Models\VisionPlan;
use Vision\Entities\Repositories\VisionRepositoryInterface;
use Vision\Http\Requests\VisionStoreRequest;
use Vision\Http\Requests\VisionUpdateRequest;

class VisionController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(private VisionRepositoryInterface $repository)
    {

    }

    public function index()
    {
//        sleep(10);
        return response()->json([
            "message" => __("Vision::messages.list_of_items", ["instance" => "Visions"]),
            "data" => $this->repository->all()
        ], HttpResponses::OK);
    }

    public function store(VisionStoreRequest $request)
    {
        $visionData = $request->all([
            "title",
            "wish_title",
            "wish_amount",
        ]);
        $visionInstance = $this->repository->store($visionData);

        return response()->json([
            "message" => __("Vision::messages.record_created", ["record" => "Vision"]),
            "data" => $visionInstance
        ], HttpResponses::CREATED);
    }

    public function update(VisionUpdateRequest $request, Vision $vision)
    {
        return response()->json([
            "message" => __("Vision::messages.record_deleted_successfully", ["record" => "Vision"]),
            "data" => $this->repository->update($vision->id, $request->all())
        ], HttpResponses::OK);
    }

    public function destroy(Vision $vision)
    {
        return response()->json([
            "message" => __("Vision::messages.record_deleted_successfully", ["record" => "Vision"]),
            "data" => $vision->delete()
        ], HttpResponses::OK);
    }

    public function planStatusToggle($id)
    {
        VisionPlan::query()
            ->where("id", $id)
            ->update(["is_done" => DB::raw('NOT is_done')]);
        return response()->json([], HttpResponses::NO_CONTENT);
    }
}
