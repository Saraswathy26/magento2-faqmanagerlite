<?php
namespace Mageesh\FaqManagerLite\Controller\Adminhtml\Faqs;
/**
 * Class NewAction
 */
class NewAction extends \Mageesh\FaqManagerLite\Controller\Adminhtml\Faqs
{
    /**
     * Create Faqs Faq
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        $offerId = (int) $this->_request->getParam('duplicate_entity_id');
        if ($offerId) {
            $offer = $this->faqFactory->create();
            $offer = $offer->load($offerId);
            if ($offer->getId()) {
                $this->_request->setParam('entity_id', $offerId);
            }
        }
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
