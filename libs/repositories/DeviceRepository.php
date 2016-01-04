<?php

namespace app\libs\repositories;

use app\models\Device;
use yii\db\Query;


class DeviceRepository
{
    protected $query;
    protected $model;

    function __construct()
    {
        $this->query = new Query;
        $this->model = new Device;
    }

}






