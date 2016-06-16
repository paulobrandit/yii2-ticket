<?php
$this->title = 'Support';

/** @var \ricco\ticket\models\TicketHead $ticketHead */
/** @var \ricco\ticket\models\TicketBody $ticketBody */

?>
<div class="text_block2">
    <div class="col-sx-12">
        <a class="btn btn-primary" onclick="history.go(-1)" style="margin-bottom: 10px">Назад</a>
    <?php $form = \yii\widgets\ActiveForm::begin([]) ?>
        <div class="col-xs-12">
            <?=$form->field($ticketBody, 'name_user')->textInput([
                'readonly' => '',
                'value' => Yii::$app->user->identity['username']
            ])?>
        </div>
        <div class="col-xs-12">
            <?=$form->field($ticketHead, 'topic')->textInput()->label('Сообщение')->error()?>
        </div>
        <div class="col-xs-12">
            <?=$form->field($ticketHead, 'department')->dropDownList([
                'Вопрос  по обмену' => 'Вопрос  по обмену',
                'Пополнению ЛК' => 'Пополнению ЛК',
                'Вводу средств' => 'Вводу средств',
                'Выводу средств' => 'Выводу средств',
            ])?>
        </div>
        <div class="col-xs-12">
            <?=$form->field($ticketBody, 'text')->textarea([
                    'style' => 'height: 150px; resize: none;'
               ])?>
        </div>
        <div class="text-center"><button class='btn btn-primary'>Отправить</button></div>
    <?php $form->end() ?>
    </div>
</div>