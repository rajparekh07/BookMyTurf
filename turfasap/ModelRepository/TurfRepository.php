<?php

namespace Turfasap\ModelRepository;


use App\Model\Turf;

class TurfRepository
{
    public function getAllTurfs () {
        return $this->getTurfQuery()->get();
    }

    public function getTurfById ($id) {
        return $this->getTurfQuery()->where('id', $id)->get()->first();
    }

    private function getTurfQuery() {
        return Turf::with(['facilities', 'images']);
    }

}