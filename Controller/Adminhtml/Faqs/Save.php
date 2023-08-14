<?php
namespace Mageesh\FaqManagerLite\Controller\Adminhtml\Faqs;
use Mageesh\FaqManagerLite\Model\Faqs;
use Mageesh\FaqManagerLite\Model\FaqsFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Psr\Log\LoggerInterface;
/**
 * Class Save
 */
class Save extends \Mageesh\FaqManagerLite\Controller\Adminhtml\Faqs
{
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
        parent::__construct(
            $context,
            $coreRegistry,
            $resultPageFactory,
            $resultJsonFactory,
            $resultForwardFactory,
            $logger,
            $faqFactory
        );
    }
    /**
     * Save action
     * @return ResultInterface
     * @throws \Exception
     */
    public function execute()
    {
        $data = $this->_request->getPostValue();
        $duplicateOfferId = $data['duplicate_entity_id'] ?? null;
        if ($duplicateOfferId && $duplicateOfferId === $data['entity_id']) {
            $this->_request->setParam('entity_id', '');
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            try {
                /** @var Faqs $model */
                $model = $this->faqFactory->create();
                $id = $this->getRequest()->getParam('entity_id');
                if ($id) {
                    $model->load($id);
                    if ($id != $model->getId()) {
                        throw new LocalizedException(__('The wrong Faq is specified.'));
                    }
                } else {
                    $data['entity_id'] = null;
                    $data['created_at'] = time();
                }
                $data['updated_at'] = time();
                if (isset($data['status']) && $data['status'] === 'true') {
                    $data['status'] = 1;
                }
                $model->setData($data);
                $model->save();
                $this->messageManager->addSuccess(__('You Saved the Faq.'));
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['entity_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}
