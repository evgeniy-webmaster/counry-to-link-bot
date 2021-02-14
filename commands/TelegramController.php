<?php


namespace app\commands;

use app\lib\CountryConverter;
use app\lib\MessageBuilder;
use Sokil\IsoCodes\TranslationDriver\SymfonyTranslationDriver;
use yii\console\Controller;
use yii\console\ExitCode;
use Yii;
use yii\helpers\Json;


class TelegramController extends Controller
{

    public function actionSetWebhook()
    {
        Yii::$app->telegram->setWebhook(['url' => $_ENV['BASE_URL'] . '/telegram/webhook']);
    }

    public function actionDeleteWebhook()
    {
        Yii::$app->telegram->deleteWebhook(['drop_pending_updates' => false]);
    }

}