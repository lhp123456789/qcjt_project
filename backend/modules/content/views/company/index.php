<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\assets\LayuiAsset;
use yii\helpers\Url;

LayuiAsset::register($this);
$this->registerJs($this->render('js/index.js'));
?>
<blockquote class="layui-elem-quote" style="font-size: 14px;">
	<?php  echo $this->render('_search', ['model' => $searchModel]); ?>
</blockquote>
<div class="layui-form menu-index">
    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
		'options' => ['class' => 'grid-view','style'=>'overflow:auto', 'id' => 'grid'],
		'tableOptions'=> ['class'=>'layui-table'],
		'pager' => [
			'options'=>['class'=>'layuipage pull-right'],
				'prevPageLabel' => '上一页',
				'nextPageLabel' => '下一页',
				'firstPageLabel'=>'首页',
				'lastPageLabel'=>'尾页',
				'maxButtonCount'=>5,
        ],
        'columns' => [
			[
				'class' => 'backend\widgets\CheckboxColumn',
				'checkboxOptions' => ['lay-skin'=>'primary','lay-filter'=>'choose'],
				'headerOptions' => ['width'=>'50','style'=> 'text-align: center;'],
				'contentOptions' => ['style'=> 'text-align: center;']
			],
            'company_name',
            'company_allname',
            'companyType.type_name',
            'strictType.name',
            [
                'attribute' => 'company_logo',
                'contentOptions' => ['style'=> 'text-align: center;'],
                'headerOptions' => ['width'=>'110','style'=> 'text-align: center;'],
                "format"=>[
                    "image",
                    [
                        "width"=>"30px",
                        "height"=>"30px",
                    ],
                ],
            ],
            'service_charge',
            [
                'attribute' => 'company_pdf',
                'format' => 'raw',
                'value' => function($model) {
                    $url=$model->company_pdf;
                    if($url!=''){
                        return Html::a('查看', $url, ['title' => '查看','target'=>'_blank','data-pjax'=>0]);
                    }else{
                        return '<font color="red">(未设置)</font>';
                    }
                },
                'contentOptions' => ['style'=> 'text-align: center'],
                'headerOptions' => [
                    'width' => '10%',
                    'style'=> 'text-align: center;'
                ],
            ],
            'linkman',
            'phone',
            [
                'attribute' => 'state',
                'format' => 'html',
                'value' => function($model) {
                    return $model->state==2?'<font color="red">待审核</font>':'<font color="green">已审核</font>';
                },
                'contentOptions' => ['style'=> 'text-align: center;'],
                'headerOptions' => [
                    'width' => '10%',
                    'style'=> 'text-align: center;'
                ],
                'label' => '审核',
            ],
            [
                'attribute' => 'check',
                'format' => 'html',
                'value' => function($model) {
                    return $model->check==2?'<font color="red">否</font>':'<font color="green">是</font>';
                },
                'contentOptions' => ['style'=> 'text-align: center;'],
                'headerOptions' => [
                    'width' => '10%',
                    'style'=> 'text-align: center;'
                ],
            ],
            [
				'header' => '操作',
				'class' => 'yii\grid\ActionColumn',
				'contentOptions' => ['class'=>'text-center'],
				'headerOptions' => [
					'width' => '10%',
					'style'=> 'text-align: center;'
				],
				'template' =>'{view} {update}{activate} {delete}',
				'buttons' => [
                    'view' => function ($url, $model, $key){
						return Html::a('查看', Url::to(['view','id'=>$model->id]), ['class' => "layui-btn layui-btn-xs layui-default-view"]);
                    },
                    'update' => function ($url, $model, $key) {
						return Html::a('修改', Url::to(['update','id'=>$model->id]), ['class' => "layui-btn layui-btn-normal layui-btn-xs layui-default-update"]);
                    },
                    'activate' => function ($url, $model, $key) {
                        if($model->state==2){
                            return Html::a('已审核', Url::to(['active','id'=>$model->id]), ['class' => "layui-btn layui-btn-xs layui-btn-normal layui-default-active"]);
                        }else{
                            return Html::a('待审核', Url::to(['active','id'=>$model->id]), ['class' => "layui-btn layui-btn-xs layui-btn-warm layui-default-inactive"]);
                        }
                    },
					'delete' => function ($url, $model, $key) {
						return Html::a('删除', Url::to(['delete','id'=>$model->id]), ['class' => "layui-btn layui-btn-danger layui-btn-xs layui-default-delete"]);
					}
				]
			],
        ],
    ]);
    ?>
<?php Pjax::end(); ?>

</div>
