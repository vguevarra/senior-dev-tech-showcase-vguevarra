<?php
declare(strict_types=1);
namespace Hnorman\PromotionalProducts\Controller\Adminhtml\Grid;

use Hnorman\PromotionalProducts\Model\GridFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;

class AddRow extends Action
{
    /**
     * @var Registry
     */
    private $coreRegistry;

    /**
     * @var GridFactory
     */
    private $gridFactory;

    /**
     * @param Context $context
     * @param Registry $coreRegistry,
     * @param GridFactory $gridFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->gridFactory = $gridFactory;
    }

    /**
     * Mapped Grid List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->gridFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getSku();
            if (!$rowData->getEntityId()) {
                $this->messageManager->addErrorMessage(__('row data no longer exist.'));
                $this->_redirect('grid/grid/rowdata');
                return;
            }
        }

        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Row Data ').$rowTitle : __('Add Row Data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Hnorman_PromotionalProducts::add_row');
    }
}
