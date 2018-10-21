<?php

namespace App\Http\Controllers;

use App\Model\Turf;
use Illuminate\Http\Request;
use Kyros\Utils\VueTable\VueTable;
use Swis\LaravelFulltext\Search;
use Turfasap\ModelRepository\TurfRepository;

class TurfController extends Controller
{
    private $repo;
    private $search;

    public function __construct(TurfRepository $repository, Search $search)
    {
        $this->repo = $repository;
        $this->search = $search;
    }

    public function index () {
        return view('turfs');
    }

    public function getAllTurfs (Request $request) {
        $dataSource = null;

        if ($request->filter) {
            $dataSource = $this->search
                                ->runForClass(request()->filter, Turf::class)
                                ->map(function ($data) {
                                   return $this->repo->getTurfById($data->indexable->id);
                                });
        } else {
            $dataSource = $this->repo->getAllTurfs();
        }

        return VueTable::with($dataSource)
                        ->sort()
                        ->paginate()
                        ->make();
    }

    public function getTurfById ($id) {
        return $this->repo->getTurfById($id);
    }


}
