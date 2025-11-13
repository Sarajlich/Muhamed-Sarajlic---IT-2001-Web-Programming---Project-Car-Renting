<?php
require_once 'CarService.php';

$car_service = new CarService();

try {
    
    $new_car = [
        'brand' => 'Toyota',
        'model' => 'Corollav2',
        'price_per_day' => 50
    ];
    $result = $car_service->createCar($new_car);
    echo "Car created successfully:\n";
    print_r($result);

    $cars = $car_service->getAll();
    echo "\nAll cars:\n";
    print_r($cars);

    $toyotas = $car_service->getByBrand('Toyota');
    echo "\nCars by brand (Toyota):\n";
    print_r($toyotas);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
