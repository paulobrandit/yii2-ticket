<?php
use ricco\ticket\models\TicketHead;
?>
<p style="text-align: left; font-size: 14px;"><?= \yii\bootstrap\Html::encode($textTicket)?></p>
<hr/>
<p>
    <strong><?= Yii::t('app', 'Ticket') ?>:&nbsp;</strong><?=$nameTicket?>
    <br/>
    <strong><?= Yii::t('app', 'Status') ?>:&nbsp;</strong>
    <?php
    switch ($status) {
        case TicketHead::OPEN :
            echo Yii::t('app', 'Open');break;
        case TicketHead::WAIT :
            echo Yii::t('app', 'Waiting');break;
        case TicketHead::ANSWER :
            echo Yii::t('app', 'Answer');break;
        case TicketHead::CLOSE :
            echo Yii::t('app', 'Close');break;
    }
    ?>
    <br/>
    <strong><?= Yii::t('app', 'Link') ?>:&nbsp;
        <a
            href="<?=$link?>"><?=$link?>
        </a>
    </strong>
</p>
<hr/>
<em>
    <span style="color: #808080;"><?= Yii::t('app', 'This email is generated automatically by the system notification service. You do not need to respond to it.') ?></span>
</em>
