<?php
namespace Mageesh\FaqManagerLite\Controller\Adminhtml\Faqs;
use Mageesh\FaqManagerLite\Controller\Adminhtml\Common\Duplicate as AbstractDuplicate;
use Mageesh\FaqManagerLite\Model\Faqs;
/**
 * Class Duplicate
 */
class Duplicate extends AbstractDuplicate
{
    /**
     * {@inheritDoc}
     */
    public function getModelClass(): string
    {
        return Faqs::class;
    }
    /**
     * {@inheritDoc}
     */
    public function getNewActionPath(): string
    {
        return '*/*/new';
    }
    /**
     * {@inheritDoc}
     */
    public function getIndexActionPath(): string
    {
        return '*/*/';
    }
}
