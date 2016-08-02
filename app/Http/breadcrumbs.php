<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('homepage'));
});
Breadcrumbs::register('product_detail', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($product->name, route('product_detail', $product->id));
});
Breadcrumbs::register('product_detail_with_category', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('home', $product->categories->first());
    $breadcrumbs->push($product->name, route('category_detail', $product->id));

});
//
//// Home > About
//Breadcrumbs::register('about', function($breadcrumbs)
//{
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('About', route('about'));
//});
//
//// Home > Blog
//Breadcrumbs::register('blog', function($breadcrumbs)
//{
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Blog', route('blog'));
//});
//
//// Home > Blog > [Category]

//
//// Home > Blog > [Category] > [Page]
//Breadcrumbs::register('page', function($breadcrumbs, $page)
//{
//    $breadcrumbs->parent('category', $page->category);
//    $breadcrumbs->push($page->title, route('page', $page->id));
//});
