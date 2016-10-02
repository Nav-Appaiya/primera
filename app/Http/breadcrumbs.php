<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('homepage'));
});
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($category->title, route('category.show', [$category->title, $category->id]));
});
Breadcrumbs::register('category.show', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('category', $category->parent);
    $breadcrumbs->push($category->title, route('product.index', [ str_replace(' ', '-', $category->parent->title),  str_replace(' ', '-', $category->title), $category->id]));
});
Breadcrumbs::register('product.show', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('category.show', $product->category);
    $breadcrumbs->push($product->name, route('product.show', [$product->title, $product->id]));
});

Breadcrumbs::register('cart', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Winkelwagen', route('cart'));
});


/////////////

// dashboard
Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('admin_dashboard_index'));
});

Breadcrumbs::register('dashboard.detail', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Detail', route('admin_property_index'));
});

Breadcrumbs::register('dashboard.detail.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('dashboard.detail');
    $breadcrumbs->push('Wijzigen', route('admin_property_edit', $id));
});

Breadcrumbs::register('dashboard.detail.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.detail');
    $breadcrumbs->push('nieuw', route('admin_property_create'));
});

// dashboard > Category
Breadcrumbs::register('dashboard.category', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Categorieën', route('admin_category_index'));
});

// dashboard > Category > edit
Breadcrumbs::register('dashboard.category.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('dashboard.category');
    $breadcrumbs->push('Wijzigen', route('admin_category_edit', $id));
});

// dashboard > Category > new
Breadcrumbs::register('dashboard.category.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.category');
    $breadcrumbs->push('Nieuw', route('admin_category_create'));
});

// dashboard > product
Breadcrumbs::register('dashboard.product.index', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Producten', route('admin_product_index'));
});

// dashboard > product > edit
Breadcrumbs::register('dashboard.product.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('dashboard.product.index');
    $breadcrumbs->push('Wijzigen', route('admin_product_edit', $id));
});

// dashboard > product > create
Breadcrumbs::register('dashboard.product.create', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.product.index');
    $breadcrumbs->push('Nieuw', route('admin_product_create'));
});

// dashboard > product > wijzigen > property
Breadcrumbs::register('dashboard.product.edit.property.create', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('dashboard.product.edit', $id);
    $breadcrumbs->push('Detail nieuw', route('admin_product_create'));
});

// dashboard > product > wijzigen > property
Breadcrumbs::register('dashboard.product.edit.property.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('dashboard.product.edit', $id);
    $breadcrumbs->push('Detail wijzigen', route('admin_product_create'));
});

///ok

// dashboard > orders
Breadcrumbs::register('dashboard.orders', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Orders', route('admin_orders_all'));
});

// dashboard > orders > edit
Breadcrumbs::register('dashboard.orders.edit', function($breadcrumbs, $id)
{
    $breadcrumbs->parent('dashboard.orders');
    $breadcrumbs->push('Edit', route('admin_orders_edit', $id));
});

// dashboard > Users
Breadcrumbs::register('dashboard.user', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Users', route('admin_profile_all'));
});

// dashboard > Users > edit
Breadcrumbs::register('dashboard.user.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard.user');
    $breadcrumbs->push('Edit', route('admin_user_edit'));
});

