<?php

namespace TCMP\OpCache\Controller\Adminhtml\Ajax;

use Magento\Backend\App\Action;

/**
 * Class Index
 *
 * @package TCMP\OpCache\Controller\Adminhtml\Index
 */
class Index extends Action
{
    /**
     * ACL Resource Name
     */
    const ADMIN_RESOURCE = 'TCMP_OpCache::config';
    /**
     * @var \Magento\Framework\View\Result\LayoutFactory
     */
    private $resultLayoutFactory;

    /**
     * Index constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\LayoutFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory
    ) {
        $this->resultLayoutFactory = $resultLayoutFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultLayoutFactory->create();
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}
