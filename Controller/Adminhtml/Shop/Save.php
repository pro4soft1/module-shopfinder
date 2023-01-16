<?php

namespace Sf\Shopfinder\Controller\Adminhtml\Shop;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Sf\Shopfinder\Model\ShopsFactory as ShopFactory;

class Save extends Action implements HttpPostActionInterface
{
    protected $shopFactory;

    public function __construct(Context $context, ShopFactory $shopFactory)
    {
        parent::__construct($context);
        $this->shopFactory = $shopFactory;
    }

    /**
     * Authorization level of a basic admin session
     */
    public const ADMIN_RESOURCE = 'Sf_Shopfinder::manage';

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface
     * @throws NotFoundException
     */
    public function execute()
    {

        $data = (array)$this->getRequest()->getParams();
        $shopId = $data['general']['entity_id'] ?? '';
        try {
            if ($data) {
                /**
                 * @var  $model \Sf\Shopfinder\Model\Shops
                 */
                if ($shopId) {
                    return $this->Update($data);
                }

                $model = $this->shopFactory->create();
                $model->setData($data['general']);

                if (isset($data['general']['image'][0]['file'])) {
                    $model->setData('image', $data['general']['image'][0]['file']);
                } else {
                  $model->unsetData('image');
                }
                if (isset($data['general'])) {
                    $model->setData('store_id', $data['general']['store_id'][0]);
                }
                 $model->save();
                $this->messageManager->addSuccessMessage(__("Shop Saved Successfully."));
                $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
                $resultRedirect->setPath('*/*/index');
                return $resultRedirect;
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("We can\'t Save You Shop, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;
    }

    /**
     * Update Shop Details
     */
    public function Update($data)
    {
        try {
            $model = $this->shopFactory->create();
            $shop = $model->load($data['general']['entity_id']);
            if (isset($data['general']['image'][0])) {
                 if (in_array('file',$data['general']['image'][0])){
                     $shop->setData('image', $data['general']['image'][0]['file']);
                 }else{
                     unset($data['general']['image']);

                 }
            } else {
                unset($data['general']['image']);
            }
            $shop->setData($data['general']);
             if (isset($data['general']['store_id'])) {
                $shop->setData('store_id', $data['general']['store_id'][0]);
            }
            $shop->save();
            $this->messageManager->addSuccessMessage(__("Shop Updated Successfully."));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;

        } catch (\Exception $exception) {
            dd($exception);
            $this->messageManager->addErrorMessage(__("We can\'t Update Your Shop, Please try again."));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;
        }
    }
}
