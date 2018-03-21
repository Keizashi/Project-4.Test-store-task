<?php

/*
 * Проект «Учет в магазине»:
 * Необходима приемка товара в магазин;
 * Продажа покупателю;
 * Отчет об остатках и движению товара.
 */

class Store
{
    /** @var array Товары в магазине */
    private $products;

    /** @var array История операций */
    private $history;

    /** объявление конструктора */
    public function __construct()
    {
        $this->products = array();
        $this->history = array();
    }

    /**
     * приёмка товара
     *
     * @param $name
     * @param $quantity
     * @return bool
     */
    public function acceptProduct($name, $quantity)
    {
        if (isset($this->products[$name])) {
            $this->products[$name] += $quantity;
        } else {
            $this->products[$name] = $quantity;
        }

        $this->history[] = date('d.m.Y H:i:s') . ': Приемка товара' . $name . ' в количестве' . $quantity;

        return true;
    }

    /**
     *  продажа товара
     *  можно продать товар только если он есть или в имеется достаточном количестве
     *
     * @param $name
     * @param $quantity
     * @return bool
     */
    public function  sellProduct($name, $quantity)
    {
        if (isset($this->products[$name]) && $this->products[$name] >= $quantity) {
    $this->products[$name] -= $quantity;

            $this->history[] = date('d.m.Y H:i:s') . ': Продажа товара' . $name . ' в количестве' . $quantity;

            return true;
        } else {
            return false;
        }
    }

    /**
     * вернуть остатки товара
     *
     * @return array
     */
    public function getRemains()
    {
        return $this->products;
    }

    /**
     * вернуть историю  движения товаров
     *
     * @return array
     */
    public function getHistory()
    {
        return $this->history;
    }
}