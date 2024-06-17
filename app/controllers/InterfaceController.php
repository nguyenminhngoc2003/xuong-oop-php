<?php

namespace App\Controllers;

interface InterfaceController
{
    public function addCustomer();
    public function postCustomer();
    public function detailCustomer($id);
    public function editCustomer($id);
    public function deleteCustomer($id);
}
