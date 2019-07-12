<?php

namespace frontend\components;

use yii\base\Component;
use yii\helpers\BaseFileHelper;
use yii\helpers\Url;

class Common extends Component
{

    const EVENT_NOTIFY = 'notify_admin';

    public static function sendMail($subject, $text, $emailFrom = 'test@mail.ru1', $nameFrom = 'test1')
    {
        if (\Yii::$app->mailer->compose()
            ->setFrom(['test@mail.ru' => 'test1'])
            ->setTo([$emailFrom => $nameFrom])
            ->setSubject($subject)
            ->setHtmlBody($text)
            ->send()) {
            self::EVENT_NOTIFY;
            return true;
        }
    }

    public function notifyAdmin($event)
    {

        print "Notify Admin";
    }

    public static function getTitleAdvert($data)
    {
        switch ($data['type']) {
            case 0:
                $data['type'] = "Квартира";
                break;
            case 1:
                $data['type'] = "Дом";
                break;
            case 2:
                $data['type'] = "Офисное помещение";
                break;
        }
        return self::getType1($data) . ' ' . $data['type'];

    }

    public static function getImageAdvert($data, $general = true, $original = false)
    {
        $image = [];
        $base = '/';

        if ($general) {
            $image[] = $base . 'uploads/adverts/' . $data['id'] . '/general/small_' . $data['general_image'];
        } else {
            $path = \Yii::getAlias("@frontend/web/uploads/adverts/" . $data['id']);
            $files = BaseFileHelper::findFiles($path);

            foreach ($files as $file) {
                if (strstr($file, "small_") && !strstr($file, "general")) {
                    $image[] = $base . 'uploads/adverts/' . $data['id'] . '/small/' . basename($file);

                }
            }
        }
        return $image;
    }

    public static function substr($text, $start = 0, $end = 50)
    {

        return mb_substr($text, $start, $end);
    }


    public static function getType($row)
    {
        return ($row['sold']) ? 'Sold' : 'New';
    }

    public static function getType1($row)
    {
        return ($row['sold']) ? '(Продано)' : 'Продаеться';
    }

    public static function getUrlAdvert($row)
    {
        return Url::to(['/main/main/view-advert', 'id' => $row['id']]);
    }
}