<?php

namespace Sf\Shopfinder\Controller\Adminhtml\test;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;
use Sf\Shopfinder\Api\ShopRepositoryInterface;

class Index implements HttpGetActionInterface
{


    /**
     * @var \Sf\Shopfinder\Api\ShopRepositoryInterface
     */
    private ShopRepositoryInterface $repository;

    public function __construct(ShopRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        echo $this->repository->getById(19)->getAddress2();
        die();
     }
}
