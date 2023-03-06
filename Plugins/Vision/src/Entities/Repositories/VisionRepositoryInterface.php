<?php

namespace Vision\Entities\Repositories;

interface VisionRepositoryInterface
{
    public function all();

    public function store(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);
}
