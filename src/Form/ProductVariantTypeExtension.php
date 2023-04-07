<?php declare(strict_types=1);

namespace App\Form;

use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductVariantTypeExtension extends AbstractTypeExtension
{
    public function __construct(
    ){}
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('stockLimit', IntegerType::class, [
            'label' => 'app.ui.stock_limit',
            'required' => false,
        ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [ProductVariantType::class];
    }
}
