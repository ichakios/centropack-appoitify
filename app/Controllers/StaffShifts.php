<?php

namespace App\Controllers;

use App\Models\StaffShiftModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request
 */

class StaffShifts extends ResourceController
{
    protected $modelName = StaffShiftModel::class;
    protected $format    = 'json';

    // GET /staff-shifts
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /staff-shifts/{id}
    public function show($id = null)
    {
        $shift = $this->model->find($id);
        if (!$shift) {
            return $this->failNotFound('Shift not found');
        }
        return $this->respond($shift);
    }

    // POST /staff-shifts
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated(['message' => 'Shift created', 'id' => $this->model->insertID()]);
    }

    // PUT /staff-shifts/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond(['message' => 'Shift updated']);
    }

    // DELETE /staff-shifts/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Shift not found');
        }

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Shift deleted']);
    }
}
