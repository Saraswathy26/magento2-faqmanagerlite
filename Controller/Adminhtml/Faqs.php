<?php
namespace Mageesh\FaqManagerLite\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Psr\Log\LoggerInterface;
use Mageesh\FaqManagerLite\Model\FaqsFactory;
abstract class Faqs extends Action
{
    /**
     * @var Registry|null
     */
    protected $coreRegistry = null;
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;
    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var FaqsFactory
     */
    protected $faqFactory;
    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param JsonFactory $resultJsonFactory
     * @param ForwardFactory $resultForwardFactory
     * @param LoggerInterface $logger
     * @param FaqsFactory $faqFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory,
        ForwardFactory $resultForwardFactory,
        LoggerInterface $logger,
        FaqsFactory $faqFactory
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->logger = $logger;
        $this->faqFactory = $faqFactory;
        parent::__construct($context);
    }
    /**
     * @return mixed
     */
    protected function _initAction()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Mageesh_FaqManagerLite::mageesh_faqmanagerlite');
        $resultPage->addBreadcrumb(__('Marketing'), __('Marketing'));
        return $resultPage;
    }
    /**
     * @param Page $resultPage
     */
    protected function prepareDefaultCustomerTitle(Page $resultPage)
    {
        $resultPage->getConfig()->getTitle()->prepend(__('Faqs'));
    }
}
