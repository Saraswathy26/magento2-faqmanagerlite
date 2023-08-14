<?php
/**
 * @author Saraswathy Shanmugam <saraswathy.shanmugam26@gmail.com>
 * @package Mageesh_FaqManagerLite
 */

namespace Mageesh\FaqManagerLite\Ui\Component\Listing\Column\Faqs\Active;
use Magento\Framework\Data\OptionSourceInterface;
class Options implements OptionSourceInterface
{
    public function toArray()
    {
        return [
            1 => __("Active"),
            0 => __("Inactive"),
        ];
    }
    public function toOptionArray()
    {
        return [
            [
                'value' => 1,
                'label' => __("Active")
            ],
            [
                'value' => 0,
                'label' => __("Inactive")
            ],
        ];
    }
}
