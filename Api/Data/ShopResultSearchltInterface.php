<?php

namespace Sf\Shopfinder\Api\Data;

interface ShopResultSearchltInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Getter for Items.
     *
     * @return \Sf\Shopfinder\Api\Data\ShopInterface[]
     */
    public function getItems();

    /**
     * Setter for Items.
     *
     * @param \Sf\Shopfinder\Api\Data\ShopInterface[] $items
     *
     * @return void
     */
    public function setItems(array $items);
}
