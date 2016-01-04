<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

use yii\db\Query;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use app\models\Device;
use app\models\DeviceSearch;
use app\models\Message;
use app\libs\repositories\UserRepository;


class KnockController extends Controller
{
    protected $user_repo;
    public $title_header;
    public $sub_title_header;

    public function init() {
        // $this->layout = 'knock-layout';
        // $this->layout = 'main_';
        $this->layout = 'dashboard-layout';
        $this->user_repo = new UserRepository();
        $this->title_header = "Dashboard";
        $this->sub_title_header = "Control Panel";
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only'  => ['list-device', 'edit-device', 'add-device', 'delete-device', 'index'],
                'rules' => [
                    [
                        // allow authenticated users
                        'actions' => ['list-device', 'edit-device', 'add-device', 'delete-device'],
                        'allow' => true,
                        'roles' => ['@'],
                         // everything else is denied by default
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
                'denyCallback' =>  function () {

                    $this->redirect(Url::to(['auth/login']));

                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionListDevice()
    {
        $searchModel = new DeviceSearch;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->title_header = "List Devices";

        return $this->render('list-device', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEditDevice()
    {
        $this->title_header = "Edit Device";
        $gets = Yii::$app->request->get();

        $users = $this->user_repo->getListUserDropdown();
        if(isset($gets['id']) and !empty($gets['id'])) {

            $model = Device::findOne(['id' => $gets['id'] ]);
            if($model) {

                $message = $this->saveModel($model) ? 'Update Success' : null;
                Yii::$app->session->setFlash('message', $message);

                return $this->render('edit-device', ['model' => $model, 'users'  => $users]);
            }

        }

        Yii::$app->session->setFlash('message', 'No data');

        return $this->render('edit-device', [
                    'model' => null,
                    'users' => $users,
                ]);
    }

    public function actionAddDevice()
    {
        $this->title_header = "Add Device";
        $model = new Device;
        if($this->saveModel($model)) {

            Yii::$app->session->setFlash('message', 'Add Success');

            return $this->redirect([ Url::to('list-device') ]);
        }

        return $this->render('add-device', [
                    'model' => $model,
                    'users' => $this->user_repo->getListUserDropdown(),
                ]);
    }


    public function actionDeleteDevice()
    {
        $id = Yii::$app->request->get('id');
        if(isset($id) and !empty($id)) {

            $device = Device::findOne($id);

            $device ? $device->delete() : '';
        }

        Yii::$app->session->setFlash('message', 'Delete Success !');

        return $this->redirect([ Url::to('list-device') ]);
    }


    public function saveModel($model)
    {
        // print_r(Yii::$app->request->post());die;
        $ok = ($model->load(Yii::$app->request->post())  && $model->save());

        // if($ok) {
        //         echo '<pre>';
        // print_r($model);
        // echo '</pre>';
        // die;
        // }

        return $ok;
    }

}
