<?php

namespace App\Inventory;

interface StockLimitInterface
{
    public function getStockLimit(): int;
}
