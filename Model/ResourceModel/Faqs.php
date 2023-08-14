<?php
namespace Mageesh\FaqManagerLite\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;
class Faqs extends AbstractDb
{
    /**
     * Serializeable field: conditions
     *
     * @var array
     */
    protected $_serializableFields = ['conditions' => [null, []]];
    /**
     * @param Context $context
     */
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
        $this->context = $context;
    }
    protected function _construct()
    {
        $this->_init('faqmanagerlite', 'entity_id');
    }
}
