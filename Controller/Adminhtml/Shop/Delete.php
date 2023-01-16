<?php

namespace Sf\Shopfinder\Controller\Adminhtml\Shop;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Sf\Shopfinder\Model\ShopsFactory;

class Delete extends Action
{
    protected ShopsFactory $shopsFactory;

    public function __construct(Context $context, ShopsFactory $shopsFactory)
    {
        parent::__construct($context);
        $this->shopsFactory = $shopsFactory;
    }

    public function execute()
    {
        $shopId = (int)$this->_request->getParam('id');
        $shop = $this->shopsFactory->create();
        /**
         * @var $shop \Sf\Shopfinder\Model\Shops
         */
        try {
            $shop = $shop->load($shopId);
            $shop->delete();
            $this->messageManager->addSuccessMessage(__('Shop Removed Successfully'));
            return $this->resultRedirectFactory->create()->setPath('/*/*/index');

        } catch (NotFoundException $exception) {

            $this->messageManager->addSuccessMessage($exception);

        }

    }
}
