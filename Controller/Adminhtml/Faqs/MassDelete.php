<?php
/**
 * @author Saraswathy Shanmugam <saraswathy.shanmugam26@gmail.com>
 * @package Mageesh_FaqManagerLite
 */

namespace Mageesh\FaqManagerLite\Controller\Adminhtml\Faqs;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Mageesh\FaqManagerLite\Model\ResourceModel\Faqs\CollectionFactory;
/**
 * Class MassDelete
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Mageesh_FaqManagerLite::Faqs';
    /**
     * @var Filter
     */
    protected $filter;
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;
    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        foreach ($collection as $offer) {
            $offer->delete();
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $collectionSize));
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
