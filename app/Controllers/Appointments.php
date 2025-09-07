<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request
 */
class Appointments extends ResourceController
{
    protected $modelName = AppointmentModel::class;
    protected $format    = 'json';

    // GET /appointments
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /appointments/{id}
    public function show($id = null)
    {
        $appointment = $this->model->find($id);
        if (!$appointment) {
            return $this->failNotFound('Appointment not found');
        }
        return $this->respond($appointment);
    }

    // POST /appointments
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated(['message' => 'Appointment created', 'id' => $this->model->insertID()]);
    }

    // PUT /appointments/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond(['message' => 'Appointment updated']);
    }

    // DELETE /appointments/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Appointment not found');
        }

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Appointment deleted']);
    }
}
