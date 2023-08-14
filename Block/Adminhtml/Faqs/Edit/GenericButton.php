<?php
/**
 * @author Saraswathy Shanmugam <saraswathy.shanmugam26@gmail.com>
 * @package Mageesh_FaqManagerLite
 */

declare(strict_types=1);
namespace Mageesh\FaqManagerLite\Block\Adminhtml\Faqs\Edit;
use Mageesh\FaqManagerLite\Block\Adminhtml\Common\Edit\GenericButton as AbstractGenericButton;
use Mageesh\FaqManagerLite\Model\FaqsFactory;
use Magento\Backend\Block\Widget\Context;
class GenericButton extends AbstractGenericButton
{
    /**
     * @var FaqsFactory
     */
    protected $faqFactory;
    /**
     * @param Context $context
     * @param FaqsFactory $faqFactory
     */
    public function __construct(
        Context $context,
        FaqsFactory $faqFactory
    ) {
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
