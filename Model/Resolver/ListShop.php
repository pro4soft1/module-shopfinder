<?php

namespace Sf\Shopfinder\Model\Resolver;


use Sf\Shopfinder\Api\ShopRepositoryInterface;
use Sf\Shopfinder\Helper\Data as DataHelper;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
class ListShop implements ResolverInterface
{


    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    private StoreManagerInterface $storeManager;
    /**
     * @var \Sf\Shopfinder\Api\ShopRepositoryInterface
     */
    private ShopRepositoryInterface $shopRepository;
    /**
     * @var \Sf\Shopfinder\Helper\Data
     */
    private DataHelper $dataHelper;

    /**
     *.
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(ShopRepositoryInterface $shopRepository,
                                SearchCriteriaBuilder $searchCriteriaBuilder,
                                StoreManagerInterface $storeManager,
                                DataHelper $dataHelper
    )
    {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->shopRepository = $shopRepository;
        $this->storeManager = $storeManager;
        $this->dataHelper = $dataHelper;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        $this->validateArgs($args);


        $searchCriteria = $this->searchCriteriaBuilder->build('shopfinder', $args);
        $searchCriteria->setCurrentPage($args['currentPage']);
        $searchCriteria->setPageSize($args['pageSize']);
        $searchResult = $this->shopRepository->getList($searchCriteria);
        foreach ($searchResult->getItems() as $item) {
//            dd($item->getImage());
            $item->setImage($this->dataHelper->getShopImageUrl($item->getImage()));
        }
        return [
            'total_count' => $searchResult->getTotalCount(),
            'items' => $searchResult->getItems(),
        ];
    }

    /**
     * @param array $args
     * @throws GraphQlInputException
     */
    private function validateArgs(array $args): void
    {
        if (isset($args['pageSize']) && $args['pageSize'] < 1) {
            throw new GraphQlInputException(__('pageSize value must be greater than 0.'));
        }

        if (isset($args['currentPage']) && $args['currentPage'] < 1) {
            throw new GraphQlInputException(__('currentPage value must be greater than 0.'));
        }


    }
}
