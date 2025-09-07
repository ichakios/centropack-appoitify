<?php

namespace App\Controllers;

use App\Models\StaffModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request
 */

class Staff extends ResourceController
{
    protected $modelName = StaffModel::class;
    protected $format    = 'json';

    // GET /staff
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /staff/{id}
    public function show($id = null)
    {
        $staff = $this->model->find($id);
        if (!$staff) {
            return $this->failNotFound('Staff not found');
        }
        return $this->respond($staff);
    }

    // POST /staff
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated(['message' => 'Staff created', 'id' => $this->model->insertID()]);
    }

    // PUT /staff/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond(['message' => 'Staff updated']);
    }

    // DELETE /staff/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Staff not found');
        }

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Staff deleted']);
    }
}
