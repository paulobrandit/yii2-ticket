<?php
/** @var \ricco\ticket\models\TicketHead $dataProvider */
?>

<div class="panel page-block">
    <div class="container-fluid row">
    <a href="<?= \yii\helpers\Url::toRoute(['admin/open']) ?>" class="btn btn-primary" style="margin-left: 15px"><?= Yii::t('ticket', 'New Ticket') ?></a>
    <br><br>
    <div class="container-fluid">
        <div class="col-md-12">
            <?= \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'rowOptions'   => function ($model) {
                    $background = '';
                    if ($model->status == 0 || $model->status == 1) {
                        $background = 'background:#E6E6FA';
                    }
                    return [
                        'style'   => "cursor:pointer;" . $background,
                    ];
                },
                'columns'      => [
                    [
                        'attribute' => 'userName',
                        'value'     => 'userName.username',
                    ],
                    [
                        'attribute' => 'department',
                        'value'     => 'department',
                    ],
                    [
                        'attribute' => 'topic',
                        'value'     => 'topic',
                    ],
                    [
                        'attribute' => 'status',
                        'value'     => function ($model) {
                            switch ($model->body['client']) {
                                case 0 :
                                    if ($model->status == \ricco\ticket\models\TicketHead::CLOSED) {
                                        return '<div class="label label-success">Client</div>&nbsp;<div class="label label-default">'.Yii::t('ticket', 'Close').'</div>';
                                    }

                                    return '<div class="label label-success">Client</div>';
                                case 1 :
                                    if ($model->status == \ricco\ticket\models\TicketHead::CLOSED) {
                                        return '<div class="label label-primary">'.Yii::t('ticket', 'Administrator').'</div>&nbsp;<div class="label label-default">'.Yii::t('ticket', 'Close').'</div>';
                                    }

                                    return '<div class="label label-primary">'.Yii::t('ticket', 'Administrator').'</div>';
                            }
                        },
                        'format'    => 'html',
                    ],
                    [
                        'attribute' => 'date_update',
                        'value'     => 'date_update',
                    ],
                    [
                        'class'         => 'yii\grid\ActionColumn',
                        'template'      => '{update}&nbsp;{delete}&nbsp;{closed}',
                        'headerOptions' => [
                            'style' => 'width:230px',
                        ],
                        'buttons'       => [
                            'update' => function ($url, $model) {
                                return \yii\helpers\Html::a(Yii::t('ticket', 'Reply'),
                                    \yii\helpers\Url::toRoute(['admin/answer', 'id' => $model['id']]),
                                    ['class' => 'btn-xs btn-info']);
                            },
                            'delete' => function ($url, $model) {
                                return \yii\helpers\Html::a(Yii::t('ticket', 'Delete'),
                                    \yii\helpers\Url::to(['admin/delete', 'id' => $model['id']]),
                                    [
                                        'class'   => 'btn-xs btn-danger',
                                        'onclick' => "return confirm(".Yii::t('ticket', 'Do you really want to delete?').")",
                                    ]
                                );
                            },
                            'closed' => function ($url, $model) {
                                return \yii\helpers\Html::a(Yii::t('ticket', 'Close'),
                                    \yii\helpers\Url::to(['admin/closed', 'id' => $model['id']]),
                                    [
                                        'class'   => 'btn-xs btn-primary',
                                        'onclick' => "return confirm(".Yii::t('ticket', 'Are you sure you want to close the ticket?').")",
                                    ]
                                );
                            },
                        ],
                    ],
                ],
            ]) ?>
        </div>
    </div>