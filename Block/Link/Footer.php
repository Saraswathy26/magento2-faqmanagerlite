<?php
namespace Mageesh\FaqManagerLite\Block\Link;
use Magento\Framework\App\DefaultPathInterface;
use Magento\Framework\View\Element\Html\Link\Current;
use Magento\Framework\View\Element\Template\Context;
class Footer extends Current
{
    /**
     * AllFooter constructor.
     *
     * @param Context $context
     * @param DefaultPathInterface $defaultPath
     * @param array $data
     */
    public function __construct(
        Context $context,
        DefaultPathInterface $defaultPath,
        array $data = []
    ) {
        parent::__construct($context, $defaultPath, $data);
    }
    /**
     * @return string
     */
    protected function _toHtml()
    {
        $this->setData([
                'label' => 'FAQs',
                'path'  => $this->getUrl('faqs'),
            ]);
        return parent::_toHtml();
    }
}
