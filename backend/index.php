<?php
require 'vendor/autoload.php';

require_once __DIR__ . '/services/CarService.php';
Flight::register('carService', 'CarService');
require_once __DIR__ . '/routes/CarRoutes.php';

require_once __DIR__ . '/services/CategoryService.php';
Flight::register('categoryService', 'CategoryService');
require_once __DIR__ . '/routes/CategoryRoutes.php';

require_once __DIR__ . '/services/PaymentService.php';
Flight::register('paymentService', 'PaymentService');
require_once __DIR__ . '/routes/PaymentRoutes.php';

require_once __DIR__ . '/services/ReservationService.php';
Flight::register('reservationService', 'ReservationService');
require_once __DIR__ . '/routes/ReservationRoutes.php';

require_once __DIR__ . '/services/UserService.php';
Flight::register('userService', 'UserService');
require_once __DIR__ . '/routes/UserRoutes.php';

Flight::start();
?>
