<?php
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/restaurantadmin', 'Auth\LoginController@showRestaurantadminLoginForm');
Route::get('/login/manager', 'Auth\LoginController@showManagerLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/restaurantadmin', 'Auth\RegisterController@showRestaurantadminRegisterForm');
Route::get('/register/manager', 'Auth\RegisterController@showManagerRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/restaurantadmin', 'Auth\LoginController@restaurantadminLogin');
Route::post('/login/manager', 'Auth\LoginController@managerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/restaurantadmin', 'Auth\RegisterController@createRestaurantadmin');
Route::post('/register/manager', 'Auth\RegisterController@createManager');

Route::get('/order', 'OrderController@index');
Route::resource('order', 'OrderController');

Route::get('/product', 'ProductController@index');
Route::resource('product', 'ProductController');

Route::get('/restaurant', 'RestaurantController@index');
Route::resource('restaurant', 'RestaurantController');

Route::get('/scoreboard', 'ScoreboardController@index');
Route::resource('scoreboard', 'ScoreboardController');

Route::get('/recentmovements', 'RecentmovementsController@index');
Route::resource('recentmovements', 'RecentmovementsController');

Route::get('/comment', 'CommentController@index');
Route::resource('comment', 'CommentController');

Route::view('/home', 'home');
Route::view('/admin', 'admin');
Route::view('/restaurantadmin', 'restaurantadmin');
Route::view('/manager', 'manager');


Route::get('logout', function ()
{
    Auth::logout();
    Session::flush();
    return redirect('/');
});

Route::get('password', 'OrderController@password');
Route::post('password', 'OrderController@updatePassword');


DB::beginTransaction();

try {

    DB::table('admins')->insert(
        ['id' => '1', 'name' => 'admin1', 'email' => 'admin1@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '1', 'name' => 'restaurantadmin1', 'email' => 'restaurantadmin1@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '1', 'name' => 'manager1', 'email' => 'manager1@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('users')->insert(
        ['id' => '1', 'name' => 'user1', 'email' => 'user1@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('products')->insert(
        ['id' => '1', 'product_name' => 'Tavuk Durum', 'product_type' => 'Fast Food',
            'product_details' => 'Tavuk Durum', 'price' => 9]
    );
    DB::table('orders')->insert(
        ['id' => '1', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-01-14',
            'product_id' => '1', 'payment_option' => 'Postpay',
            'quantity' => '3', 'order_status' => 'Confirm']
    );

    DB::commit();

} catch (\Exception $e) {
    DB::rollback();

}

try {
    DB::table('admins')->insert(
        ['id' => '2', 'name' => 'admin2', 'email' => 'admin2@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '2', 'name' => 'restaurantadmin2', 'email' => 'restaurantadmin2@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '2', 'name' => 'manager2', 'email' => 'manager2@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('users')->insert(
        ['id' => '2', 'name' => 'user2', 'email' => 'user2@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('products')->insert(
        ['id' => '2', 'product_name' => 'Patates Kızartması', 'product_type' => 'Snack',
            'product_details' => 'Patates Kızartması', 'price' => 5]
    );
    DB::table('orders')->insert(
        ['id' => '2', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-01-15',
            'product_id' => '2', 'payment_option' => 'Prepay (Full)',
            'quantity' => '2', 'order_status' => 'Confirm']
    );

    DB::commit();

} catch (\Exception $e) {
    DB::rollback();

}

try {
    DB::table('admins')->insert(
        ['id' => '3', 'name' => 'admin3', 'email' => 'admin3@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '3', 'name' => 'restaurantadmin3', 'email' => 'restaurantadmin3@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '3', 'name' => 'manager3', 'email' => 'manager3@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('users')->insert(
        ['id' => '3', 'name' => 'user3', 'email' => 'user3@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('products')->insert(
        ['id' => '3', 'product_name' => 'Et İskender', 'product_type' => 'Ana Yemek',
            'product_details' => 'Et İskender + ', 'price' => 21]
    );
    DB::table('orders')->insert(
        ['id' => '3', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-01-17',
            'product_id' => '3', 'payment_option' => 'Prepay (Full)',
            'quantity' => '1', 'order_status' => 'Confirm']
    );
    DB::commit();

} catch (\Exception $e) {
    DB::rollback();

}



try {
    DB::table('admins')->insert(
        ['id' => '4', 'name' => 'admin4', 'email' => 'admin4@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('admins')->insert(
        ['id' => '5', 'name' => 'admin5', 'email' => 'admin5@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('admins')->insert(
        ['id' => '6', 'name' => 'admin6', 'email' => 'admin6@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('orders')->insert(
        ['id' => '4', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-01-17',
            'product_id' => '4', 'payment_option' => 'Postpay',
            'quantity' => '4', 'order_status' => 'Confirm']
    );
    DB::table('admins')->insert(
        ['id' => '7', 'name' => 'admin7', 'email' => 'admin7@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('admins')->insert(
        ['id' => '8', 'name' => 'admin8', 'email' => 'admin8@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('orders')->insert(
        ['id' => '5', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-01-27',
            'product_id' => '5', 'payment_option' => 'Prepay (Half)',
            'quantity' => '10', 'order_status' => 'Confirm']
    );
    DB::table('admins')->insert(
        ['id' => '9', 'name' => 'admin9', 'email' => 'admin9@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('orders')->insert(
        ['id' => '6', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-01-29',
            'product_id' => '6', 'payment_option' => 'Prepay (Full)',
            'quantity' => '3', 'order_status' => 'Confirm']
    );
    DB::table('admins')->insert(
        ['id' => '10', 'name' => 'admin10', 'email' => 'admin10@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('orders')->insert(
        ['id' => '7', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-02-03',
            'product_id' => '7', 'payment_option' => 'Postpay',
            'quantity' => '1', 'order_status' => 'Confirm']
    );
} catch (\Exception $e) {
    DB::rollback();

}


try {
    DB::table('restaurantadmins')->insert(
        ['id' => '4', 'name' => 'restaurantadmin4', 'email' => 'restaurantadmin4@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '5', 'name' => 'restaurantadmin5', 'email' => 'restaurantadmin5@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('orders')->insert(
        ['id' => '8', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-02-03',
            'product_id' => '8', 'payment_option' => 'Prepay (Full)',
            'quantity' => '3', 'order_status' => 'Send']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '6', 'name' => 'restaurantadmin6', 'email' => 'restaurantadmin6@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '7', 'name' => 'restaurantadmin7', 'email' => 'restaurantadmin7@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('orders')->insert(
        ['id' => '9', 'name' => 'user1', 'phone' => '3333333333',
            'address' => 'Beytepe', 'delivery_date' => '2019-02-05',
            'product_id' => '9', 'payment_option' => 'Prepay (Full)',
            'quantity' => '2', 'order_status' => 'Send']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '8', 'name' => 'restaurantadmin8', 'email' => 'restaurantadmin8@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '9', 'name' => 'restaurantadmin9', 'email' => 'restaurantadmin9@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('orders')->insert(
        ['id' => '10', 'name' => 'user1', 'phone' => '1111111111',
            'address' => 'Etimesgut', 'delivery_date' => '2019-02-07',
            'product_id' => '10', 'payment_option' => 'Prepay (Half)',
            'quantity' => '5', 'order_status' => 'Confirm']
    );
    DB::table('restaurantadmins')->insert(
        ['id' => '10', 'name' => 'restaurantadmin10', 'email' => 'restaurantadmin10@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
} catch (\Exception $e) {
    DB::rollback();

}


try {
    DB::table('managers')->insert(
        ['id' => '4', 'name' => 'manager4', 'email' => 'manager4@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '5', 'name' => 'manager5', 'email' => 'manager5@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '6', 'name' => 'manager6', 'email' => 'manager6@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '7', 'name' => 'manager7', 'email' => 'manager7@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '8', 'name' => 'manager8', 'email' => 'manager8@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '9', 'name' => 'manager9', 'email' => 'manager9@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('managers')->insert(
        ['id' => '10', 'name' => 'manager10', 'email' => 'manager10@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
} catch (\Exception $e) {
    DB::rollback();

}


try {
    DB::table('users')->insert(
        ['id' => '4', 'name' => 'user4', 'email' => 'user4@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('users')->insert(
        ['id' => '5', 'name' => 'user5', 'email' => 'user5@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('users')->insert(
        ['id' => '6', 'name' => 'user6', 'email' => 'user6@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('products')->insert(
        ['id' => '9', 'product_name' => 'Magnolya', 'product_type' => 'Tatlı',
            'product_details' => 'Çilekli Sütlü Tatlı', 'price' => 9]
    );
    DB::table('users')->insert(
        ['id' => '7', 'name' => 'user7', 'email' => 'user7@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('users')->insert(
        ['id' => '8', 'name' => 'user8', 'email' => 'user8@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('users')->insert(
        ['id' => '9', 'name' => 'user9', 'email' => 'user9@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );

    DB::table('restaurants')->insert(
        ['id' => '1', 'name' => 'src', 'account' => 300,
            'city' => 'Ankara', 'district' => 'Beytepe',
            'phone' => '05135418648468', 'product_id' => '1']
    );
    DB::table('restaurants')->insert(
        ['id' => '2', 'name' => 'Simitci', 'account' => 500,
            'city' => 'Ankara', 'district' => 'Beytepe',
            'phone' => '05135418648468', 'product_id' => '3']
    );
} catch (\Exception $e) {
    DB::rollback();

}


try {
    DB::table('products')->insert(
        ['id' => '4', 'product_name' => 'Sütlaç', 'product_type' => 'Tatlı',
            'product_details' => 'Sütlaç', 'price' => 7]
    );
    DB::table('products')->insert(
        ['id' => '5', 'product_name' => 'Tavuk Kavurma Menü', 'product_type' => 'Menü',
            'product_details' => 'Çorba + Tavuk Kavurma + İçecek', 'price' => 17]
    );
    DB::table('products')->insert(
        ['id' => '6', 'product_name' => 'Ayran', 'product_type' => 'İçecek',
            'product_details' => 'Ayran', 'price' => 3]
    );
    DB::table('products')->insert(
        ['id' => '7', 'product_name' => 'Waffle', 'product_type' => 'Tatlı',
            'product_details' => 'Waffle', 'price' => 15]
    );
    DB::table('products')->insert(
        ['id' => '8', 'product_name' => 'Kaşarlı Kavurmalı Pide', 'product_type' => 'Fast Food',
            'product_details' => 'Kaşarlı Kavurmalı Pide', 'price' => 10]
    );
    DB::table('users')->insert(
        ['id' => '10', 'name' => 'user10', 'email' => 'user10@gmail.com',
            'password' => '$2y$10$6idzub6jqP2L40VJy0rTJ.Dx/GMlndQtjQfQY1zpZIGvpsRmrGiAK']
    );
    DB::table('restaurants')->insert(
        ['id' => '4', 'name' => 'Aslı Börek', 'account' => 1000,
            'city' => 'Ankara', 'district' => 'Beytepe',
            'phone' => '054352452532', 'product_id' => '6']
    );
    DB::table('products')->insert(
        ['id' => '10', 'product_name' => 'Mantı', 'product_type' => 'Ana Yemek',
            'product_details' => 'Mantı', 'price' => 15]
    );
    DB::table('restaurants')->insert(
        ['id' => '3', 'name' => 'Fesleğen', 'account' => 1100,
            'city' => 'Ankara', 'district' => 'Beytepe',
            'phone' => '053423141', 'product_id' => '5']
    );


    DB::commit();

} catch (\Exception $e) {
    DB::rollback();

}


