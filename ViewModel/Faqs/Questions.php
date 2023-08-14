<?php
namespace Mageesh\FaqManagerLite\ViewModel\Faqs;
use Mageesh\FaqManagerLite\Model\ResourceModel\Faqs\CollectionFactory;
use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;
class Questions implements ArgumentInterface
{
    private CollectionFactory $collectionFactory;
    private FilterProvider $filterProvider;

    /**
     * @param FilterProvider $filterProvider
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        FilterProvider    $filterProvider,
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->filterProvider = $filterProvider;
    }
    public function getHeading():string
    {
        return __('Frequently Asked Questions');
    }
    /**
     * @return DataObject[]
     */
    public function getAllProductFaqs()
    {
        return $this->collectionFactory->create()
            ->addFieldToFilter('related_to', 'product')
            ->getItems();
    }

    public function getAllGeneralFaqs()
    {
        return $this->collectionFactory->create()
            ->addFieldToFilter('related_to', 'general')
            ->getItems();
    }

    /**
     * Prepare HTML content
     *
     * @param $value
     * @return string
     * @throws \Exception
     */
    public function getCmsFilterContent($value)
    {
        $html = $this->filterProvider->getPageFilter()->filter($value);
        return $html;
    }

}
