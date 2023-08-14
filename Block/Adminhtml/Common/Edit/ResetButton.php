<?php
namespace Mageesh\FaqManagerLite\Block\Adminhtml\Common\Edit;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
/**
 * Class ResetButton
 */
class ResetButton implements ButtonProviderInterface
{
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }
    /**
     * @return array
     */
    public function getButtonData()
    {
        $offerId = (int) $this->request->getParam('duplicate_entity_id');
        if ($offerId) {
            return [];
        }
        return [
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}
