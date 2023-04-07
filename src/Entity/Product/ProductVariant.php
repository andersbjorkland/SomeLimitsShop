<?php

declare(strict_types=1);

namespace App\Entity\Product;

use App\Inventory\StockLimitInterface;
use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;
use Sylius\Component\Product\Model\ProductVariantTranslationInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product_variant")
 */
#[ORM\Entity]
#[ORM\Table(name: 'sylius_product_variant')]
class ProductVariant extends BaseProductVariant implements StockLimitInterface
{
    /**
     * @ORM\Column(type="integer", nullable=true, options={"default" : 0})
     */
    private $stockLimit;

    protected function createTranslation(): ProductVariantTranslationInterface
    {
        return new ProductVariantTranslation();
    }

    public function getStockLimit(): int
    {
        return $this->stockLimit ?? 0;
    }

    /**
     * @param mixed $stockLimit
     */
    public function setStockLimit(?int $stockLimit): void
    {
        $this->stockLimit = $stockLimit;
    }


}
