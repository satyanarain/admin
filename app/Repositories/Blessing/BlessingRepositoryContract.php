<?php
namespace App\Repositories\Blessing;
interface BlessingRepositoryContract
{
    public function find($id);
    public function getAllBlessings();
    public function create($requestData);
    public function update($id, $requestData);

}
