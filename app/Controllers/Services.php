<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request
 */

class Services extends ResourceController
{
    protected $modelName = ServiceModel::class;
    protected $format    = 'json';

    // GET /services
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /services/{id}
    public function show($id = null)
    {
        $service = $this->model->find($id);
        if (!$service) {
            return $this->failNotFound('Service not found');
        }
        return $this->respond($service);
    }

    // POST /services
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated(['message' => 'Service created', 'id' => $this->model->insertID()]);
    }

    // PUT /services/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond(['message' => 'Service updated']);
    }

    // DELETE /services/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Service not found');
        }

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Service deleted']);
    }
}
