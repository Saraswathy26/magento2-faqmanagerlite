<?php
/**
 * @author Saraswathy Shanmugam <saraswathy.shanmugam26@gmail.com>
 * @package Mageesh_FaqManagerLite
 */

namespace Mageesh\FaqManagerLite\Model\ResourceModel\Faqs;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'mageesh_faqmanagerlite_faq_collection';
    protected $_eventObject = 'faq_collection';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Mageesh\FaqManagerLite\Model\Faqs',
            'Mageesh\FaqManagerLite\Model\ResourceModel\Faqs'
        );
    }
}
