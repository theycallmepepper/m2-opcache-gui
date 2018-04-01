<?php

namespace TCMP\OpCache\Controller\Adminhtml\Reset;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\RedirectFactory;
use Psr\Log\LoggerInterface;
use TCMP\OpCache\Helper\Data as OpCacheHelper;

/**
 * Class Index
 *
 * @package TCMP\OpCache\Controller\Adminhtml\Result
 */
class Index extends Action
{
    /**
     * ACL Resource Name
     */
    const ADMIN_RESOURCE = 'TCMP_OpCache::config';
    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    private $redirectFactory;
    /**
     * @var OpCacheHelper
     */
    private $helper;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Index constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param OpCacheHelper $helper
     * @param LoggerInterface $logger
     * @param \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory
     */
    public function __construct(
        Context $context,
        OpCacheHelper $helper,
        LoggerInterface $logger,
        RedirectFactory $redirectFactory
    ) {
        $this->helper = $helper;
        $this->redirectFactory = $redirectFactory;
        $this->logger = $logger;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $result = $this->redirectFactory->create();
        try {
            $this->helper->resetOpCache();
            $this->messageManager->addSuccessMessage(__('OPCache reset successfully'));
            $result->setPath('opcache/index/index');
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $this->messageManager->addExceptionMessage($e);
        }
        return $result;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}
