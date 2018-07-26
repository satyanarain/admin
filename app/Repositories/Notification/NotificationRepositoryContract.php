<?php
namespace App\Repositories\Notification;
interface NotificationRepositoryContract
{
    public function find($id);
    public function getAllNotifications();
    public function create($requestData);
    public function update($id, $requestData);

}
