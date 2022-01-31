<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// ****************************
// Admin pages
// ****************************
// Articles
Breadcrumbs::for('admin.article', function (BreadcrumbTrail $trail) {
    $trail->push('Articles', route('admin.article'));
});
Breadcrumbs::for('article.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.article');
    $trail->push('Edit', route('article.edit', $id));
});
Breadcrumbs::for('article.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.article');
    $trail->push('Create', route('article.create'));
});

// Users
Breadcrumbs::for('admin.user', function (BreadcrumbTrail $trail) {
    $trail->push('Users', route('admin.user'));
});
Breadcrumbs::for('user.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.user');
    $trail->push('Edit', route('user.edit', $id));
});

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
