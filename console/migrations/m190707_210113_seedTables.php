<?php

use common\models\Advert;
use common\models\Subscribe;
use common\models\User;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\db\Migration;
use yii\helpers\BaseFileHelper;
use yii\imagine\Image;

/**
 * Class m190707_210113_seedTables
 */
class m190707_210113_seedTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i <= 30; $i++) {
            $user = $this->createUser($faker);

            $advert = new Advert([
                'price' => rand(150000, 500000),
                'address' => $faker->address,
                'fk_agent' => $user->id,
                'bedroom' => rand(0, 1),
                'livingroom' => rand(0, 1),
                'parking' => rand(0, 1),
                'kitchen' => rand(0, 1),
                'general_image' => '/',
                'description' => $faker->realText(rand(500, 2000)),
                'location' => '('.$faker->latitude.','.$faker->longitude.')',
                'hot' => rand(0, 1),
                'sold' => rand(0, 1),
                'type' => rand(0, 2),
                'recommend' => rand(0, 1),
                'created_at' => time(),
                'updated_at' => time(),
            ]);

            $advert->save(false);

            $this->generalImage($advert, $faker);
            $this->images($advert, $faker);
        }
    }

    /**
     * @param  \Faker\Generator  $faker
     * @return User
     */
    protected function createUser(\Faker\Generator $faker)
    {
        $statusKey = array_rand(User::STATUSES, 1);
        $user = new User([
            'username' => $faker->name,
            'email' => $faker->email,
            'status' => User::STATUSES[$statusKey],
        ]);
        $user->setPassword('secret');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save(false);

        return $user;
    }

    /**
     * @param  Advert  $advert
     * @param  \Faker\Generator  $faker
     * @return array
     * @throws \yii\base\Exception
     */
    protected function generalImage(Advert $advert, \Faker\Generator $faker): void
    {
        $path = Yii::getAlias("@frontend/web/uploads/adverts/".$advert->id."/general");
        BaseFileHelper::createDirectory($path);

        $name = $faker->image($path, 640, 480, null, false);

        $image = $path.DIRECTORY_SEPARATOR.$name;

        $new_name = $path.DIRECTORY_SEPARATOR."small_".$name;

        $advert->general_image = $name;
        $advert->save(false);

        $this->createThumbnail($image, $new_name);
    }

    /**
     * @param $image
     * @param $new_name
     */
    protected function createThumbnail($image, $new_name)
    {
        $size = getimagesize($image);
        $width = $size[0];
        $height = $size[1];

        Image::frame($image, 0, '666', 0)
            ->crop(new Point(0, 0), new Box($width, $height))
            ->resize(new Box(1000, 644))
            ->save($new_name, ['quality' => 100]);
    }

    /**
     * @param  Advert  $advert
     */
    protected function images(Advert $advert, \Faker\Generator $faker): void
    {
        for ($i = 0; $i <= rand(1, 3); $i++) {
            $path = Yii::getAlias("@frontend/web/uploads/adverts/".$advert->id."/small");

            BaseFileHelper::createDirectory($path);

            $name = $faker->image($path, 640, 480, null, false);

            $image = $path.DIRECTORY_SEPARATOR.$name;

            $new_name = $path.DIRECTORY_SEPARATOR."small_".$name;

            $this->createThumbnail($image, $new_name);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        User::deleteAll();
        Advert::deleteAll();
        Subscribe::deleteAll();
    }
}
