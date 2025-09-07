<?php

namespace App\Controllers;

use App\Models\BusinessHourModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request
 */

class BusinessHours extends ResourceController
{
    protected $modelName = BusinessHourModel::class;
    protected $format    = 'json';

    // GET /business-hours
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /business-hours/{id}
    public function show($id = null)
    {
        $hour = $this->model->find($id);
        if (!$hour) {
            return $this->failNotFound('Business hour not found');
        }
        return $this->respond($hour);
    }

    // POST /business-hours
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated(['message' => 'Business hour created', 'id' => $this->model->insertID()]);
    }

    // PUT /business-hours/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond(['message' => 'Business hour updated']);
    }

    // DELETE /business-hours/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Business hour not found');
        }

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Business hour deleted']);
    }
}
