<?php

namespace Vision\Entities\Repositories;

use Vision\Entities\Models\Vision;

class VisionRepository implements VisionRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = resolve(Vision::class);
    }

    public function all()
    {
        return $this->model::query()
            ->with(["dates", "plans", "prices"])
            ->get();
    }

    public function updateOrCreate($data)
    {
        return $this->model::query()
            ->updateOrCreate($data);
    }

    public function store(array $data)
    {
        return $this->model::query()
            ->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model::query()
            ->update(["id" => $id], $data);
    }

    public function destroy(int $id)
    {
        return $this->model::query()
            ->delete();
    }
}
