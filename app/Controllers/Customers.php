<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

/**
 * @property IncomingRequest $request
 */

class Customers extends ResourceController
{
    protected $modelName = CustomerModel::class;
    protected $format    = 'json';

    // GET /customers
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /customers/{id}
    public function show($id = null)
    {
        $customer = $this->model->find($id);
        if (!$customer) {
            return $this->failNotFound('Customer not found');
        }
        return $this->respond($customer);
    }

    // POST /customers
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated(['message' => 'Customer created', 'id' => $this->model->insertID()]);
    }

    // PUT /customers/{id}
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);

        if (!$this->model->update($id, $data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respond(['message' => 'Customer updated']);
    }

    // DELETE /customers/{id}
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Customer not found');
        }

        $this->model->delete($id);
        return $this->respondDeleted(['message' => 'Customer deleted']);
    }
}
