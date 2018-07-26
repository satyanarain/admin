<?php
namespace App\Repositories\Donation;
interface DonationRepositoryContract
{
    public function find($id);
    public function getAllDonations();
    public function create($requestData);
    public function update($id, $requestData);

}
