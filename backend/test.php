<?php
require_once 'dao/UserDao.php';
require_once 'dao/CategoryDao.php';
require_once 'dao/CarDao.php';
require_once 'dao/ReservationDao.php';
require_once 'dao/PaymentDao.php';

$userDao = new UserDao();
$categoryDao = new CategoryDao();
$carDao = new CarDao();
$reservationDao = new ReservationDao();
$paymentDao = new PaymentDao();

$userDao->insert([
   'name' => 'Johnaaadadadaany Doe',
   'email' => 'johnnaaaadadadaay@example.com',
   'password_hash' => password_hash('password1aa213', PASSWORD_DEFAULT),
   'role' => 'USER'
]);

$categoryDao->insert([
   'name' => 'Economy',
   'description' => 'Affordable and fuel-efficient cars'
]);

$carDao->insert([
   'brand' => 'Toyota',
   'model' => 'Corolla',
   'year' => 2022,
   'price_per_day' => 70.00,
   'status' => 1,
   'category_id' => 1
]);

$reservationDao->insert([
   'user_id' => 1,
   'car_id' => 1,
   'start_date' => date('Y-m-d H:i:s', strtotime('+1 day')),
   'end_date' => date('Y-m-d H:i:s', strtotime('+3 days')),
   'total_price' => 210.00,
   'status' => 'CONFIRMED'
]);

$paymentDao->insert([
   'reservation_id' => 1,
   'amount' => 210.00,
   'date' => date('Y-m-d H:i:s'),
   'method' => 'CARD'
]);

$users = $userDao->getAll();
print_r($users);

$categories = $categoryDao->getAll();
print_r($categories);

$cars = $carDao->getAll();
print_r($cars);

$reservations = $reservationDao->getAll();
print_r($reservations);

$payments = $paymentDao->getAll();
print_r($payments);
?>
