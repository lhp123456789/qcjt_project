<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use content\models\CompanyType;
use content\models\StrictType;

$this->registerJs($this->render('js/upload.js'));
?>

<div class="menu-form create_box">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?= $form->field($model, 'company_allname')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?= $form->field($model, 'type_id')->dropDownList(CompanyType::dropDown()) ?>

    <?= $form->field($model, 'strict_id')->dropDownList(StrictType::dropDown())->label('严选类型') ?>

    <?= $form->field($model, 'pro_describe')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?= $form->field($model, 'company_logo',['template' => '{label} <div class="row"><div class="col-sm-12">{input}<button type="button" class="layui-btn upload_button" id="test4"><i class="layui-icon"></i>上传文件</button>{error}{hint}</div></div>'])->textInput(['maxlength' => true,'class'=>'layui-input upload_input']) ?>

    <?= Html::img(@$model->company_logo, ['width'=>'50','height'=>'50','class'=>'layui-circle company_logo'])?>

    <?= $form->field($model, 'service_charge')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?= $form->field($model, 'linkman')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?= $form->field($model, 'post')->textInput(['maxlength' => true,'class'=>'layui-input']) ?>

    <?=$form->field($model, 'company_describe')->textarea(['maxlength' => true,'rows'=>"10",'cols'=>"30",'autofocus'=>'autofocus']) ?>

    <?= $form->field($model, 'company_pdf',['template' => '{label} <div class="row"><div class="col-sm-12">{input}<button type="button" class="layui-btn upload_button" id="test6"><i class="layui-icon"></i>上传pdf文件</button>{error}{hint}</div></div>'])->textInput(['maxlength' => true,'class'=>'layui-input upload_input']) ?>

    <div align='right' style="margin-top:10px;">
        <?=
        Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord? 'layui-btn' : 'layui-btn layui-btn-normal'])
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
