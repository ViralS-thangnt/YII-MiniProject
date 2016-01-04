<?php
use yii\helpers\Url;

?>
<a class="btn btn-info" href="<?= Url::to(['knock/edit-device', 'id'    => $model->id ]) ?>"> Edit</a>
<!-- <a class="btn btn-primary" href="/knock/add-device"> Add </a> -->
<a class="btn btn-danger" href="<?= Url::to(['knock/delete-device', 'id'    => $model->id ]) ?>" onclick="return confirmDelete()"> Delete</a>

<script type="text/javascript">
    function confirmDelete() {

        return confirm('You want to detete this item ?');
    }
</script>

