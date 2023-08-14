<?php
namespace Mageesh\FaqManagerLite\Block\Adminhtml\Common\Edit;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
/**
 * Class DuplicateButton
 */
abstract class DuplicateButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function getButtonData(): array
    {
        $data = [];
        if ($this->getEntityId()) {
            $data = [
                'label' => __('Duplicate Faqs'),
                'class' => 'duplicate',
                'url' => $this->getDuplicateUrl(),
                'sort_order' => 15,
            ];
        }
        return $data;
    }
    /**
     * @return string
     */
    public function getDuplicateUrl(): string
    {
        return $this->getUrl($this->getDuplicateActionUrl(), ['entity_id' => $this->getEntityId()]);
    }
    /**
     * @return string
     */
    public function getDuplicateActionUrl(): string
    {
        return '*/*/duplicate';
    }
}
