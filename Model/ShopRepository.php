<?php

namespace Sf\Shopfinder\Model;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sf\Shopfinder\Api\ShopRepositoryInterface;
use Sf\Shopfinder\Model\ShopsFactory as ShopsFactory;
use Sf\Shopfinder\Model\ResourceModel\Shops as ShopResourceModel;
use Sf\Shopfinder\Model\ResourceModel\Shops\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Sf\Shopfinder\Api\Data\ShopResultSearchltInterfaceFactory;

class ShopRepository implements ShopRepositoryInterface
{


    protected \Sf\Shopfinder\Model\ShopsFactory $shopFactory;
    /**
     * @var \Sf\Shopfinder\Model\ResourceModel\Shops
     */
    protected ShopResourceModel $resourceModel;
    /**
     * @var \Sf\Shopfinder\Model\ResourceModel\Shops\CollectionFactory
     */
    protected CollectionFactory $collectionFactory;
    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    protected CollectionProcessorInterface $collectionProcessor;
    /**
     * @var \Sf\Shopfinder\Api\Data\ShopResultSearchltInterfaceFactory
     */
    private ShopResultSearchltInterfaceFactory $shopResultSearchltInterfaceFactory;


    public function __construct(ShopResultSearchltInterfaceFactory $shopResultSearchltInterfaceFactory, ShopsFactory $shopsFactory, ShopResourceModel $resourceModel, CollectionFactory $collectionFactory, CollectionProcessorInterface $collectionProcessor)
    {
        $this->shopFactory = $shopsFactory;
        $this->resourceModel = $resourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->shopResultSearchltInterfaceFactory = $shopResultSearchltInterfaceFactory;
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id)
    {
        /**
         * @var $shop \Sf\Shopfinder\Model\Shops
         */
        $shop = $this->shopFactory->create();
        $this->resourceModel->load($shop, $id);
        if (!$shop->getId()) {
            throw new NoSuchEntityException(__('Shop with id "%1" does not exist.', $id));
        }
        return $shop;
    }

    /**
     * @inheritDoc
     */
    public function save(\Sf\Shopfinder\Api\Data\ShopInterface $shop)
    {
        $this->resourceModel->save($shop);
        return $shop;
    }

    /**
     * @inheritDoc
     */
    public function delete(\Sf\Shopfinder\Api\Data\ShopInterface $shop)
    {
        try {
            $this->resourceModel->delete($shop);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    )
    {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->shopResultSearchltInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

}
