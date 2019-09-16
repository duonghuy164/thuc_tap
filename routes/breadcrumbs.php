<?php
/*
|--------------------------------------------------------------------------
| Web Breakcrumbs
|--------------------------------------------------------------------------
*/
/**
* Faqs
*/
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('system_admin.page.index'));
});


// Home > Blog > Bài viết
Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('home');
    $trail->push('Bài viết');
});

// Home > Blog > Create new post
Breadcrumbs::for('addpost', function ($trail) {
    $trail->parent('home');
    $trail->push('Create new post');
});

// Home > Blog > Edit Post
Breadcrumbs::for('editpost', function ($trail) {
    $trail->parent('home');
    $trail->push('Edit Post');
});

// Home > Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push('Chuyên mục');
});

// Home > Chuyên mục > Tạo chuyên mục
Breadcrumbs::for('addcategory', function ($trail) {
    $trail->parent('categories');
    $trail->push('Tạo chuyên mục');
});

// Home > Chuyên mục > Chỉnh sửa chuyên mục
Breadcrumbs::for('editcategory', function ($trail) {
    $trail->parent('categories');
    $trail->push('Chỉnh sửa chuyên mục');
});

// Home > Trang
Breadcrumbs::for('pages', function ($trail) {
    $trail->parent('home');
    $trail->push('Trang');
});
// Home > Trang > Tạo Trang
Breadcrumbs::for('addpage', function ($trail) {
    $trail->parent('pages');
    $trail->push('Tạo trang');
});
// Home > Trang > Sửa Trang
Breadcrumbs::for('editpage', function ($trail) {
    $trail->parent('pages');
    $trail->push('Sửa trang');
});
Breadcrumbs::for('timekeeping', function ($trail) {
    $trail->parent('home');
    $trail->push('Chấm công');
});
Breadcrumbs::for('staffs', function ($trail) {
    $trail->parent('home');
    $trail->push('Nhân viên');
});
Breadcrumbs::for('addstaffs', function ($trail) {
    $trail->parent('staffs');
    $trail->push('Thêm nhân viên');
});
Breadcrumbs::for('editstaffs', function ($trail) {
    $trail->parent('staffs');
    $trail->push('Sửa nhân viên');
});