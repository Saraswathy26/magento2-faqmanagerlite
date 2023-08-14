<?php
namespace Mageesh\FaqManagerLite\Controller\Adminhtml\Faqs;
use Mageesh\FaqManagerLite\Controller\Adminhtml\Faqs;
use Magento\Framework\Controller\ResultInterface;
class Edit extends Faqs
{
    /**
     * Create new Faq page
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $faqId = (int)$this->getRequest()->getParam('entity_id');
        $faqData = [];
        $faq = $this->faqFactory->create();
        $isExistingFaq = (bool)$faqId;
        if ($isExistingFaq) {
            $faq = $faq->load($faqId);
            if (!$faq->getId()) {
                $this->messageManager->addErrorMessage(__('Something went wrong while editing the Faq.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('faqmanagerlite/*/index');
                return $resultRedirect;
            }
        }
        $faqData['entity_id'] = $faqId;
        $this->_getSession()->setData($faqData);
        $resultPage = $this->resultPageFactory->create();
        if ($isExistingFaq) {
            $resultPage->getConfig()->getTitle()->prepend(__('Edit Faq'));
        } else {
            $resultPage->getConfig()->getTitle()->prepend(__('New Faq'));
        }
        return $resultPage;
    }
}
