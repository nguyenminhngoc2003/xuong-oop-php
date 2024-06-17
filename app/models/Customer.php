<?php

namespace App\Models;
// require_once 'app/models/BaseModel.php';
class Customer extends BaseModel
{
    protected $table = 'tb_customers';
    public function getListCustomer()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }

    public function addCustomer(array $data)
    {
        $ho_ten = $data['ho_ten'];
        $email = $data['email'];
        $so_dien_thoai = $data['so_dien_thoai'];
        $dia_chi = $data['dia_chi'];
        $sql = "INSERT INTO $this->table (`ho_ten`,`email`,`so_dien_thoai`,`dia_chi`) VALUES (?,?,?,?)";
        $options = [$ho_ten, $email, $so_dien_thoai, $dia_chi];
        $this->setQuery($sql);
        $this->execute($options);
    }
    public function detailCustomer($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function editCustomer($id, array $data)
    {
        $ho_ten = $data['ho_ten'];
        $email = $data['email'];
        $so_dien_thoai = $data['so_dien_thoai'];
        $dia_chi = $data['dia_chi'];
        $sql = "UPDATE $this->table SET ho_ten=?,email=?,so_dien_thoai=?,dia_chi=? WHERE id=?";
        $this->setQuery($sql);
        $options = [$ho_ten, $email, $so_dien_thoai, $dia_chi, $id];
        return $this->execute($options, $id);
    }
    public function deleteCustomer($id)
    {
        $sql = "DELETE FROM $this->table WHERE id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
