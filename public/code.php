<?php

require_once '/home/gogeruk/Php_learning/PHP_advanced/lesson_6/work/vendor/autoload.php';
require_once '/home/gogeruk/Php_learning/PHP_advanced/lesson_6/work/config/eloquent.php';

////////////////////////////////////////////
////    В файле index.php реализовать:  ////
////////////////////////////////////////////

////    1. Создать 5 категорий (insert)    ////

// I
$task1_1 = new \Hillel\Model\Category();
$task1_1->title = "C1";
$task1_1->slug = "S1";
$task1_1->save();
// II
$task1_2 = new \Hillel\Model\Category();
$task1_2->title = "C2";
$task1_2->slug = "S2";
$task1_2->save();
// III
$task1_3 = new \Hillel\Model\Category();
$task1_3->title = "C3";
$task1_3->slug = "S3";
$task1_3->save();
// IV
$task1_4 = new \Hillel\Model\Category();
$task1_4->title = "C4";
$task1_4->slug = "S4";
$task1_4->save();
// V
$task1_5 = new \Hillel\Model\Category();
$task1_5->title = "C5";
$task1_5->slug = "S5";
$task1_5->save();

////    2. Изменить 1 категорию (update)    ////

$task2_u = \Hillel\Model\Category::find(2);
$task2_u->title = "C6";
$task2_u->save();

////    3. Удалить 1 категорию (delete)    ////

$task3_d = \Hillel\Model\Category::find(1);
$task3_d->delete();


////    4. Создать 10 постов, прикрепив случайную категорию    ////

for ($i=1; $i < 11; $i++) {

    $roll = rand(1, 3);
    $find_c = new \Hillel\Model\Category();

    $post = new \Hillel\Model\Post();

    $post->title = $find_c::all()[$roll]["title"];
    $post->slug = $find_c::all()[$roll]["slug"];
    $post->body = "B"."$i";
    $post->category_id = $find_c::all()[$roll]["id"];
    $post->save();

}


////    Обновить 1 пост, заменив поля + категорию  ////

$cat = \Hillel\Model\Category::find(4);

$post = \Hillel\Model\Post::find(4);
$post->title = "C888";
$post->slug = "S888";
$post->body = "B888";
$cat->posts()->save($post);



////    6. Удалить пост    ////

$post = \Hillel\Model\Post::find(1);
$post->delete();


////    7. Создать 10 тегов  1///

for ($i=1; $i < 11; $i++) {
    $tag = new \Hillel\Model\Tag();
    $tag->title = "C"."$i";
    $tag->slug = "S"."$i";
    $tag->save();
}


////    8. Каждому уже сохранённому посту прикрепить по 3 случайных тега    ////

for ($i=2; $i <11; $i++) {
    $post = \Hillel\Model\Post::find($i);
    $post->tags()->attach([rand(2, 10), rand(2, 10), rand(2, 10)]);
}

?>
