<?php
/**
 * @author Saraswathy Shanmugam <saraswathy.shanmugam26@gmail.com>
 * @package Mageesh_FaqManagerLite
 */

namespace Mageesh\FaqManagerLite\Ui\Component\Listing\Column\Faqs\Type;
use Magento\Framework\Data\OptionSourceInterface;
class Options implements OptionSourceInterface
{
    const TYPE_PRODUCT = 'product';
    const TYPE_GENERAL = 'general';
    public function toArray()
    {
        return [
            self::TYPE_PRODUCT => __("Product"),
            self::TYPE_GENERAL => __("General"),
        ];
    }
    public function toOptionArray()
    {
        return [
            [
                'value' => self::TYPE_PRODUCT,
                'label' => __("Product Page")
            ],
            [
                'value' => self::TYPE_GENERAL,
                'label' => __("General")
            ],
        ];
    }
}
