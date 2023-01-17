<?php

namespace Sf\Shopfinder\Api;


interface ShopRepositoryInterface
{


    /**
     * @param int $id
     *
     * @return \Sf\Shopfinder\Api\Data\ShopInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id);


    /**
     * @param \Sf\Shopfinder\Api\Data\ShopInterface $shop
     *
     * @return \Sf\Shopfinder\Api\Data\ShopInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function save(\Sf\Shopfinder\Api\Data\ShopInterface $shop);


    /**
     * @param \Sf\Shopfinder\Api\Data\ShopInterface $shop
     *
     * @return bool true
     * @return Magento\Framework\Exception\NoSuchEntityException
     */
    public function delete(\Sf\Shopfinder\Api\Data\ShopInterface $shop);



    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sf\Shopfinder\Api\Data\ShopResultSearchltInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

}
