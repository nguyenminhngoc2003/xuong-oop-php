<?php

namespace App\Models;

interface interfaceModel
{
    public function addCustomer(array $data);
    public function detailCustomer($id);
    public function editCustomer($id, array $data);
    public function deleteCustomer($id);
}
