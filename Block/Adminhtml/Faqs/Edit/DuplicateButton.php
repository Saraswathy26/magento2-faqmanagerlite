<?php
/**
 * @author Saraswathy Shanmugam <saraswathy.shanmugam26@gmail.com>
 * @package Mageesh_FaqManagerLite
 */

namespace Mageesh\FaqManagerLite\Block\Adminhtml\Faqs\Edit;
use Mageesh\FaqManagerLite\Block\Adminhtml\Common\Edit\DuplicateButton as AbstractDuplicateButton;
use Mageesh\FaqManagerLite\Model\FaqsFactory;
use Magento\Backend\Block\Widget\Context;
/**
 * Class DuplicateButton
 */
class DuplicateButton extends AbstractDuplicateButton
{
    /**
     * @var FaqsFactory
     */
    protected $faqsFactory;
    /**
     * @param Context $context
     * @param FaqsFactory $faqFactory
     */
    public function __construct(
        Context $context,
        FaqsFactory $faqFactory
    ){
        parent::__construct($context);
        $this->faqsFactory = $faqFactory;
    }
    /**
     * {@inheritDoc}
     */
    public function getModelFactory()
    {
        return $this->faqsFactory;
    }
}
