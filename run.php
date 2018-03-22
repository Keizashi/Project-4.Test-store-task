<?php

require('Store.php');

$shop = new Store();
echo "Создали новый магазин\n";

while (true) {
    echo "Выберите команду: 1 - Приемка товара, 2 - Продажа товара, 3 - Вывод остатков на складе, 4 - Вывод движений товара, 5 Выход.\n";

    $command = trim(fgets(STDIN));
    switch ($command) {
        case 1:
            echo "Введите название товара: ";
            $name = trim(fgets(STDIN));

            echo "Введите количество товара: ";
            $quantity = trim(fgets(STDIN));

            if ($shop->acceptProduct($name, $quantity) == true) {
                echo "Товар успешно принят\n";
            }
            break;

        case 2:
            echo "Введите название товара: ";
            $name = trim(fgets(STDIN));

            echo "Введите количество товара: ";
            $quantity = trim(fgets(STDIN));

            if ($shop->sellProduct($name, $quantity) == true) {
                echo "Товар успешно продан\n";
            } else {
                echo "Товар не продан: закончился или недостаточно на складе\n";
            }
            break;

        case 3:
            $remains = $shop->getRemains();
            echo "Текущие остатки товара на складе:\n";
            foreach ($remains as $name => $quantity) {
                echo $name . ' осталось: ' . $quantity . "\n";
            }
            break;

        case 4:
            $history = $shop->getHistory();
            echo "Движение товара:\n";
            foreach ($history as $note) {
                echo $note . "\n";
            }
            break;

        case 5:
            echo "Выходим из программы\n";
            die;
            break;

        default:
            echo "Введена неверная команда, повторите\n";
            break;

    }
}