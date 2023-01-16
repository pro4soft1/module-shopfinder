<?php

namespace Sf\Shopfinder\Ui\Component\Form;

use Sf\Shopfinder\Model\ResourceModel\Shops\CollectionFactory;
use Sf\Shopfinder\Helper\Data as Helper;

/**
 * DataProvider component.
 */
class Shopfinder extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $helper;

    /**
     * @param string            $name
     * @param string            $primaryFieldName
     * @param string            $requestFieldName
     * @param CollectionFactory $contactCollectionFactory
     * @param array             $meta
     * @param array             $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        Helper $helper,
        array $meta = [],
        array $data = []
    )
    {
        $this->helper = $helper;
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }


    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var \Sf\Shopfinder\Model\Shops $customer */
        foreach ($items as $shop) {

            $fieldsData = $shop->getData();
            if ($image = $this->prepareImage($fieldsData['image'])) {
                $fieldsData['image'] = $this->prepareImage($fieldsData['image']);
            }


            $this->loadedData[$shop->getId()]['general'] = $fieldsData;

        }

        return $this->loadedData;

    }


    public function prepareImage($image)
    {
        return array(
            array(
                'name' => $image,
                'url' => $this->helper->getShopImageUrl($image),
            )
        );
    }
}
