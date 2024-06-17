<?php

namespace App\Controllers;

use App\Models\Customer;

// include_once 'app/models/Customer.php';
// include_once 'app/controllers/BaseController.php';
class CustomerController extends BaseController
{
    protected $customer;
    public function __construct()
    {
        $this->customer = new Customer();
    }
    public function getCustomer()
    {
        $customers = $this->customer->getListCustomer();
        return $this->render('customer.index', compact('customers'));
    }

    public function addCustomer()
    {
        return $this->render('customer.add');
    }
    public function postCustomer()
    {
        if (isset($_POST['add'])) {
            $errors = [];
            if (empty($_POST['ho_ten'])) {
                $errors[] = 'Họ tên không được trống';
            }
            if (empty($_POST['email'])) {
                $errors[] = 'Email không được trống';
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email không đúng định dạng';
            }
            if (empty($_POST['so_dien_thoai'])) {
                $errors[] = 'Số điện thoại không được trống';
            }
            if (empty($_POST['dia_chi'])) {
                $errors[] = 'Địa chỉ không được trống';
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'add-teacher');
            } else {
                $postData = [
                    'ho_ten' => $_POST['ho_ten'],
                    'email' => $_POST['email'],
                    'so_dien_thoai' => $_POST['so_dien_thoai'],
                    'dia_chi' => $_POST['dia_chi'],
                ];
                $this->customer->addCustomer($postData);
                header('Location:' . BASE_URL);
            }
        }
    }
    public function detailCustomer($id)
    {
        $customer = $this->customer->detailCustomer($id);
        return $this->render('customer.edit', compact('customer'));
    }
    public function editCustomer($id)
    {
        if (isset($_POST['edit'])) {
            $errors = [];
            if (empty($_POST['ho_ten'])) {
                $errors[] = 'Họ tên không được trống';
            }
            if (empty($_POST['email'])) {
                $errors[] = 'Email không được trống';
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Email không đúng định dạng';
            }
            if (empty($_POST['so_dien_thoai'])) {
                $errors[] = 'Số điện thoại không được trống';
            }
            if (empty($_POST['dia_chi'])) {
                $errors[] = 'Địa chỉ không được trống';
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'detail-teacher/' . $id);
            } else {
                $postData = [
                    'ho_ten' => $_POST['ho_ten'],
                    'email' => $_POST['email'],
                    'so_dien_thoai' => $_POST['so_dien_thoai'],
                    'dia_chi' => $_POST['dia_chi'],
                ];
                $this->customer->editCustomer($id, $postData);
                header('Location:' . BASE_URL);
            }
        }
    }
    public function deleteCustomer($id)
    {
        $result = $this->customer->deleteCustomer($id);
        if ($result) {
            header('Location:' . BASE_URL);
        }
    }
}
