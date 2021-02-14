<?php

namespace app\lib;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use Yii;

class CountryConverter
{
    const WIKI_BASE_URL = 'https://en.wikipedia.org';

    private $dataIndexedByName;

    public function __construct()
    {
        $json = file_get_contents(Yii::getAlias('@app/data.json'));
        $data = Json::decode($json);

        $this->dataIndexedByName = ArrayHelper::index($data, 'name');
    }

    public function getIso2CodeByName($name)
    {
        return $this->dataIndexedByName[$name]['code'] ?? null;
    }

    public function getWikiLinkByName($name)
    {
        return self::WIKI_BASE_URL . ($this->dataIndexedByName[$name]['link'] ?? null);
    }
}