<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait APITrait
{
    use SearchableTrait;

    protected $model;
    protected $searchableFields = [];

    public function index(Request $request)
    {
        $model = $this->getModelInstance();
        $query = $model::query();

        $query = $this->extendQuery($query);

        if ($request->type === 'count') {
            $data = $query->count();
            return $this->success($data);
        }

        if ($request->type === 'all') {
            $data = $query->get();
        } else {
            if ($request->limit) {
                $data = $query->paginate($request->limit);
            } else {
                $data = $query->paginate(15); // Ubah angka ini sesuai dengan jumlah item per halaman yang diinginkan
            }
        }

        return response()->json($data);
    }

    public function show($id)
    {
        $model = $this->getModelInstance();
        $data = $model::findOrFail($id);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $model = $this->getModelInstance();
        $data = $model::create($request->all());

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $model = $this->getModelInstance();
        $data = $model::findOrFail($id);
        $data->update($request->all());

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $model = $this->getModelInstance();
        $data = $model::findOrFail($id);
        $data->delete();

        return response()->json(null, 204);
    }

    protected function extendQuery($query)
    {
        if (!empty($this->searchableFields)) {
            $search = request()->input('search');
            $this->applySearch($query, $search, $this->searchableFields);
        }

        return $query;
    }

    private function getModelInstance()
    {
        if (!$this->model) {
            $controllerName = class_basename($this);
            $modelName = "App\\Models\\" . str_replace('Controller', '', $controllerName);
            if (!class_exists($modelName)) {
                abort(500, 'No model defined and default model ' . $modelName . ' does not exist.');
            }
            $this->model = app($modelName);
        }

        return $this->model;
    }

    protected function success($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
