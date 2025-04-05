<?php
declare(strict_types=1);

namespace Hnorman\PromoProducts\Controller\Adminhtml\View;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected bool|PageFactory $resultPageFactory = false;
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute(): Page|ResultInterface|ResponseInterface
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Hnorman_PromoProducts::menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Promotional Products'));
        return $resultPage;
    }
    protected function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed('Hnorman_PromoProducts::menu');
    }
}
