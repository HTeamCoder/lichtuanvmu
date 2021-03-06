<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CountdownSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Quản lý sự kiện');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countdown-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Thêm mới sự kiện'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'summary' => "Hiển thị <strong>{begin}</strong> -> <strong>{end}</strong> của <strong>{count}</strong> sự kiện",
        'emptyText'=>'<p class="text-center"><strong class="text-danger">Không tìm thấy kết quả nào</strong></p>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'tieude',
                'value'=>function($model)
                {
                    return '<a href="'.Url::to(['countdown/view','id'=>$model->id]).'" title="'.$model->tieude.'" style="text-decoration : none;">'.$model->tieude.'</a>';
                },
                'format'=>'html',
            ],
            [
                'attribute'=>'thoigiandienra',
                'value'=>function($model)
                {
                    return date('d-m-Y H:i',strtotime($model->thoigiandienra));
                },
                'filter'=>false
                
            ],
            [
                'attribute'=>'dadienra',
                'label'=>'Hoạt động',
                'value'=>function($model)
                {
                    return ($model->dadienra == 0)?'Sắp diễn ra':'Kết thúc';
                },
                'filter'=>Html::activeDropDownList($searchModel,'dadienra',\yii\helpers\ArrayHelper::map([
                        ['id' => 0, 'name' => 'Sắp diễn ra'], ['id' => 1, 'name' => 'Kết thúc'],
                    ],'id','name'),['prompt' => 'Tất cả','class' => 'form-control']),
                
            ],
            [
            'attribute'=>'active',
            'label'=>'Trạng thái',
            'value'=>function($model)
                {
                    return $model->active == 'hienthi'?'Hiển thị':'Không hiển thị';},
                'filter' => Html::activeDropDownList($searchModel,'active',\yii\helpers\ArrayHelper::map([
        ['id' =>'hienthi', 'name' => 'Hiển thị'], ['id' => 'khonghienthi', 'name' => 'Không hiển thị'],
    ],'id','name'),['prompt' => 'Tất cả','class' => 'form-control']),

            ],
            // [
            //     'attribute'=>'donvi_id',
            //     'value'=>function($model)
            //     {
            //         return $model->donvi->tendonvi;
            //     },
            //     'filter'=>(Yii::$app->user->identity->roles == 'admin')?Html::activeDropDownList($searchModel,'donvi_id',\yii\helpers\ArrayHelper::map(\common\models\donvi::find()->all(),'id','tendonvi'
            //     ),['prompt' => 'Tất cả','class' => 'form-control']):false,
            // ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
