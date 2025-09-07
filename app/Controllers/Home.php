<?php

namespace App\Controllers;

use App\Models\StaffModel;
use App\Models\ServiceModel;
use App\Models\CustomerModel;
use App\Models\AppointmentModel;

class Home extends BaseController
{
    public function book_now()
    {
        $data = [];
        echo view('layouts/header', $data);
        echo view('book_now', $data);
        echo view('layouts/footer', $data);
    }
    public function index()
    {
        $staffModel = new StaffModel();
        $servicesModel = new ServiceModel();
        $customersModel = new CustomerModel();
        $appointmentsModel = new AppointmentModel();

        $data = [
            'staff' => $staffModel->findAll(),
            'services' => $servicesModel->findAll(),
            'customers' => $customersModel->findAll(),
            'appointments' => $appointmentsModel->findAll(),
        ];

        echo view('layouts/header', $data);
        echo view('welcome_message', $data);
        echo view('layouts/footer', $data);

        // return view('welcome_message', $data);
    }

    public function dashboard()
    {
        $staffModel = new StaffModel();
        $servicesModel = new ServiceModel();
        $customersModel = new CustomerModel();
        $appointmentsModel = new AppointmentModel();

        $data = [
            'staff' => $staffModel->findAll(),
            'services' => $servicesModel->findAll(),
            'customers' => $customersModel->findAll(),
            'appointments' => $appointmentsModel->findAll(),
        ];
        echo view('layouts/header', $data);
        echo view('dashboard', $data);
        echo view('layouts/footer', $data);
    }
}
