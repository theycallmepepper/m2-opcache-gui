<?php

namespace TCMP\OpCache\Block\Adminhtml;

use Magento\Framework\View\Element\Template\Context;
use TCMP\OpCache\Helper\Data as OpCacheHelper;

/**
 * Class Gui
 *
 * @package TCMP\OpCache\Block\Adminhtml
 */
class Gui extends AbstractBlock
{
    /**
     * @var OpCacheHelper
     */
    public $helper;

    /**
     * Gui constructor.
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
        {
            $this->helper = $helper;
            parent::__construct($helper, $context, $data);
        }
    }
}
