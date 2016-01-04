<?php
namespace app\libs\repositories;

use app\models\User;
use yii\db\Query;


class UserRepository
{
    protected $query;
    protected $model;

    function __construct()
    {
        $this->query = new Query;
        $this->model = new User;
    }

    public function getAllUser($fields = array('id', 'email'), $orderBy = 'id')
    {

        return $this->query->select($fields)->from('users')->orderBy($orderBy)->all();
    }

    public function getListUserDropdown($fields = array('id', 'email'), $orderBy = 'id')
    {
        $users = $this->getAllUser($fields, $orderBy);

        $new_users = [];

        foreach ($users as $key => $user) {
            $new_users[$user['id']] =$user['email'];
        }

        return $new_users;
    }




}


