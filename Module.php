<?php

namespace ricco\ticket;

use ricco\ticket\models\User;
use Yii;

/**
 * ticket module definition class
 */
class Module extends \yii\base\Module {

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ricco\ticket\controllers';

    /** @var bool Уведомление на почту о тикетах */
    public $mailSend = true;

    /** @var string Тема email сообщения когда пользователю приходит ответ */
    public $subjectAnswer = 'Response by the ticket';

    /** @var  User */
    public $userModel = false;
    public $qq = [
        'ask_question' => 'Ask Question',
        'bug' => 'Report a Bug',
        'new_feature' => 'New Feature',
    ];

    /** @var array Ники администраторав */
    public $admin = ['admin'];

    /** @var string  */
    public $uploadFilesDirectory = '@webroot/fileTicket';

    /** @var string  */
    public $uploadFilesExtensions = 'png, jpg';

    /** @var int  */
    public $uploadFilesMaxFiles = 5;

    /** @var null|int */
    public $uploadFilesMaxSize = null;

    /** @var bool|int */
    public $pageSize = false;

    /**
     * @inheritdoc
     */
    public function init() {
        User::$user = ($this->userModel !== false) ? $this->userModel : Yii::$app->user->identityClass;
        parent::init();
        $this->registerTranslations();
    }
    /**
     * Registration of translation class.
     */
    protected function registerTranslations()
    {
        Yii::$app->i18n->translations['ticket'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@ricco/ticket/messages',
            'fileMap' => [
              'ticket' => 'ticket.php',
            ],
        ];
    }

}
