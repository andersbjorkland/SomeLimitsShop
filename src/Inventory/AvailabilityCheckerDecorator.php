<?php

declare(strict_types=1);

namespace App\Inventory;

use Sylius\Component\Inventory\Checker\AvailabilityCheckerInterface;
use Sylius\Component\Inventory\Model\StockableInterface;

class AvailabilityCheckerDecorator implements AvailabilityCheckerInterface
{
    public function __construct(
        private AvailabilityCheckerInterface $availabilityChecker
    ){}

    public function isStockAvailable(StockableInterface $stockable): bool
    {
        return $this->isStockSufficient($stockable, 1);
    }

    public function isStockSufficient(StockableInterface $stockable, int $quantity): bool
    {
        if ($stockable->isTracked() && $stockable instanceof StockLimitInterface) {
            $currentStock = $stockable->getOnHand() - $stockable->getOnHold();
            $availableStock = $currentStock - $stockable->getStockLimit();

            return $quantity <= $availableStock;
        }

        return $this->availabilityChecker->isStockSufficient($stockable, $quantity);
    }
}
