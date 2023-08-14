<?php
namespace Mageesh\FaqManagerLite\Controller\Adminhtml\Common;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\RedirectFactory;
/**
 * Class Duplicate
 */
abstract class Duplicate extends Action
{
    /**
     * @var RedirectFactory
     */
    protected $redirectFactory;
    /**
     * @param Context $context
     * @param RedirectFactory $redirectFactory
     */
    public function __construct(
        Context $context,
        RedirectFactory $redirectFactory)
    {
        parent::__construct($context);
        $this->redirectFactory = $redirectFactory;
    }
    /**
     * {@inheritDoc}
     */
    public function execute()
    {
        $resultRedirect = $this->redirectFactory->create();
        $id = $this->getRequest()->getParam('entity_id');
        if ($id) {
            $model = $this->_objectManager->create($this->getModelClass());
            $model->load($id);
            if ($model->getId()) {
                return $resultRedirect->setPath($this->getNewActionPath(), [
                    'duplicate_entity_id' => $id,
                ]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a Faq to duplicate.'));
        return $resultRedirect->setPath($this->getIndexActionPath());
    }
    /**
     * @return string
     */
    abstract public function getModelClass(): string;
    /**
     * @return string
     */
    abstract public function getNewActionPath(): string;
    /**
     * @return string
     */
    abstract public function getIndexActionPath(): string;
}
