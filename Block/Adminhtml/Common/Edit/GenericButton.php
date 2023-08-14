<?php
namespace Mageesh\FaqManagerLite\Block\Adminhtml\Common\Edit;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\App\RequestInterface;
/**
 * Class GenericButton
 */
abstract class GenericButton
{
    /**
     * @var Context
     */
    protected $context;
    /**
     * @var RequestInterface
     */
    protected $request;
    /**
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
        $this->request = $context->getRequest();
    }
    /**
     * @return int|null
     */
    public function getEntityId()
    {
        $model = $this->getModelFactory()->create();
        $model->load($this->request->getParam('entity_id'));
        $modelId = $model->getId();
        if (!$modelId) {
            return null;
        }
        $offerId = (int) $this->request->getParam('duplicate_entity_id');
        if ($offerId && (int) $modelId === $offerId) {
            return null;
        }
        return $modelId;
    }
    /**
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
    /**
     * @return mixed
     */
    abstract public function getModelFactory();
}
