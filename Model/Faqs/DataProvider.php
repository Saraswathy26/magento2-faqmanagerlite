<?php
namespace Mageesh\FaqManagerLite\Model\Faqs;
use Mageesh\FaqManagerLite\Model\ResourceModel\Faqs\Collection;
use Mageesh\FaqManagerLite\Model\ResourceModel\Faqs\CollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
/**
 * Class DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var Collection
     */
    protected $collection;
    /**
     * @var array
     */
    protected $loadedData;
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var RequestInterface
     */
    protected $request;
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $faqCollectionFactory
     * @param StoreManagerInterface $storeManager
     * @param RequestInterface $request
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $faqCollectionFactory,
        StoreManagerInterface $storeManager,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->request = $request;
        $this->collection = $faqCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        $this->loadedData = [];
        foreach ($items as $faq) {
            $this->loadedData[$faq->getId()] = $faq->getData();
        }
        if ('faqmanagerlite_faqs_edit' === $this->request->getFullActionName()) {
            $duplicateEntityId = (int) $this->request->getParam('duplicate_entity_id');
            if ($duplicateEntityId) {
                if (isset($this->loadedData[$duplicateEntityId])) {
                    $this->loadedData[$duplicateEntityId]['duplicate_entity_id'] = $duplicateEntityId;
                }
            }
        }
        return $this->loadedData;
    }
}
