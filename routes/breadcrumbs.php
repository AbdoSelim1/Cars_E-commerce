<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
     $trail->push('الصفحه الرئسيه', route('admin'));
});


Breadcrumbs::macro('resource', function (string $name, string $title) {
     // Dashboard > Model
     Breadcrumbs::for("{$name}.index", function (BreadcrumbTrail $trail) use ($name, $title) {
         $trail->parent('dashboard');
         $trail->push($title, route("{$name}.index"));
     });
 
     // Dashboard > Model > Create
     Breadcrumbs::for("{$name}.create", function (BreadcrumbTrail $trail) use ($name,$title) {
         $trail->parent("{$name}.index");
         $trail->push("انشاء {$title}", route("{$name}.create"));
     });
 

     // Dashboard > Model >[Edit]
     Breadcrumbs::for("{$name}.edit", function (BreadcrumbTrail $trail, $model) use ($name) {
         $trail->parent("{$name}.index");
         $trail->push("تعديل {$model->name} ", route("{$name}.edit", $model));
     });
 });
 Breadcrumbs::resource('brands','العلامات التجاريه');
 Breadcrumbs::resource('models','المديلات');
 Breadcrumbs::resource('categories','الاقسام');
 Breadcrumbs::resource('products','المنتجات');
 Breadcrumbs::resource('cities',"المدن");
 Breadcrumbs::resource('roles',"الوظائف");
 Breadcrumbs::resource('admins',"المشرفين");
 Breadcrumbs::resource('regions',"المناطق");
 Breadcrumbs::resource('sellers',"التجار");
 Breadcrumbs::resource('shops',"المحلات");





 