<?php
use backend\assets\LayuiAsset;
LayuiAsset::register($this);
?>
<div class="guan-product-type-update">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
