<?php

$this->title = 'Support';

/** @var \ricco\ticket\models\TicketHead $ticketHead */
/** @var \ricco\ticket\models\TicketBody $ticketBody */
?>
<div class="panel page-block">
    <div class="col-sx-12">
        <a class="btn btn-primary" href="<?= \yii\helpers\Url::toRoute(['ticket/index']) ?>"
           style="margin-bottom: 10px; margin-left: 15px"><?= Yii::t('ticket', 'Go back') ?></a>
           <?php $form = \yii\widgets\ActiveForm::begin([]) ?>
        <div class="col-xs-12">
            <?=
            $form->field($ticketBody, 'name_user')->textInput([
                'readonly' => '',
                'value' => Yii::$app->user->identity['username'],
            ])
            ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($ticketHead, 'topic')->textInput()->label(Yii::t('ticket', 'Message'))->error() ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($ticketHead, 'department')->dropDownList($qq) ?>
        </div>
        <div class="col-xs-12">
            <?=
            $form->field($ticketBody, 'text')->textarea([
                'style' => 'height: 150px; resize: none;',
            ])
            ?>
        </div>
        <div class="col-xs-12">
            <?=
            $form->field($fileTicket, 'fileName[]')->fileInput([
                'multiple' => true,
                'accept' => 'image/*',
            ])->label(false);
            ?>

        </div>
        <div class="text-center">
            <button class='btn btn-primary'><?= Yii::t('ticket', 'Send Ticket') ?></button>
        </div>
<?php $form->end() ?>
    </div>
</div>
