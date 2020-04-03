<?php

namespace TCMP\OpCache\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use TCMP\OpCache\Helper\Data as OpCacheHelper;

/**
 * Class AbstractBlock
 *
 * @package TCMP\OpCache\Block\Adminhtml
 */
abstract class AbstractBlock extends Template
{
    /**
     * @var OpCacheHelper
     */
    private $helper;

    /**
     * AbstractBlock constructor.
     *
     * @param OpCacheHelper $helper
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        OpCacheHelper $helper,
        Context $context,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Don't render panel if OPcache not installed/enabled
     * @return string
     */
    public function _toHtml()
    {
        if ($this->helper->isEnabled() && $this->helper->isInstalled()) {
            return parent::_toHtml();
        }
        return __('OpCache is not installed or properly enabled.');
    }
}
