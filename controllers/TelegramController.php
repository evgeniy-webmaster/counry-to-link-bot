<?php


namespace app\controllers;

use app\lib\MessageBuilder;
use yii\helpers\Json;
use yii\web\Controller;
use Yii;


class TelegramController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     *
     */
    public function actionWebhook()
    {
        Yii::info(Yii::$app->request->rawBody,'TelegramWebhook');

        $updateData = Json::decode(Yii::$app->request->rawBody);
        $chat_id = $updateData['message']['chat']['id'] ?? null;
        $text = $updateData['message']['text'] ?? null;

        Yii::$app->telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => MessageBuilder::getFlagAndWikiLinkByCountryCode($text),
            'reply_markup' => json_encode([
                'inline_keyboard'=>[
                    [
                        ['text'=>"refresh",'callback_data'=> time()]
                    ]
                ]
            ]),
        ]);
    }

}