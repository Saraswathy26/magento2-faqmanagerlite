<?php
namespace Mageesh\FaqManagerLite\Model;
use Magento\Framework\Model\AbstractModel;
class Faqs extends AbstractModel
{
    protected $_eventPrefix = 'mageesh_faqmanagerlite_faq';
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Mageesh\FaqManagerLite\Model\ResourceModel\Faqs');
    }
}
