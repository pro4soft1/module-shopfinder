<?php

namespace Sf\Shopfinder\Model;

use Magento\Framework\Model\AbstractModel;
use Sf\Shopfinder\Api\Data\ShopInterface;
use Sf\Shopfinder\Model\ResourceModel\Shops as ResourceModel;

class Shops extends AbstractModel implements ShopInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'shop_finders_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }


    /**
     * @inheritDoc
     */
    public function getShopId(): ?int
    {
        return $this->getId();
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->getData('name');
    }

    /**
     * @inheritDoc
     */
    public function setName(?string $name): void
    {
        $this->setData('name', $name);
    }

    /**
     * @inheritDoc
     */
    public function getIdentifier(): ?string
    {
        return $this->getData('identifier');
    }

    /**
     * @inheritDoc
     */
    public function setIdentifier(?string $identifier): void
    {
        $this->setData('identifier', $identifier);
    }

    /**
     * @inheritDoc
     */
    public function getAddress(): ?string
    {
        return $this->getData('address');
    }

    /**
     * @inheritDoc
     */
    public function setAddress(?string $address): void
    {
        $this->setData('address', $address);
    }

    /**
     * @inheritDoc
     */
    public function getAddress2(): ?string
    {
        return $this->getData('address_2');
    }

    /**
     * @inheritDoc
     */
    public function setAddress2(?string $address2): void
    {
        $this->setData('address_2', $address2);
    }

    /**
     * @inheritDoc
     */
    public function getCity(): ?string
    {
        return $this->getData('city');
    }

    /**
     * @inheritDoc
     */
    public function setCity(?string $city): void
    {
        $this->setData('city', $city);
    }

    /**
     * @inheritDoc
     */
    public function getCountry(): ?string
    {
        return $this->getData('country');
    }

    /**
     * @inheritDoc
     */
    public function setCountry(?string $country): void
    {
        $this->setData('country', $country);
    }

    /**
     * @inheritDoc
     */
    public function getState(): ?string
    {
        return $this->getData('state');
    }

    /**
     * @inheritDoc
     */
    public function setState(?string $state): void
    {
        $this->setData('state', $state);
    }

    /**
     * @inheritDoc
     */
    public function getZip(): ?int
    {
        return $this->getData('zip');
    }

    /**
     * @inheritDoc
     */
    public function setZip(?int $zip): void
    {
        $this->setData('zip', $zip);
    }

    /**
     * @inheritDoc
     */
    public function getPhone(): ?int
    {
        return $this->getData('phone');
    }

    /**
     * @inheritDoc
     */
    public function setPhone(?int $phone): void
    {
        $this->setData('phone', $phone);
    }

    /**
     * @inheritDoc
     */
    public function getLatitude(): ?int
    {
        return $this->getData('latitude');
    }

    /**
     * @inheritDoc
     */
    public function setLatitude(?int $latitude): void
    {
        $this->setData('latitude', $latitude);
    }

    /**
     * @inheritDoc
     */
    public function getLongitude(): ?int
    {
        return $this->getData('longitude');
    }

    /**
     * @inheritDoc
     */
    public function setLongitude(?int $longitude): void
    {
        $this->setData('longitude', $longitude);
    }

    /**
     * @inheritDoc
     */
    public function getEmail(): ?string
    {
        return $this->getData('email');
    }

    /**
     * @inheritDoc
     */
    public function setEmail(?string $email): void
    {
        $this->setData('email', $email);
    }

    /**
     * @inheritDoc
     */
    public function getImage(): ?string
    {
        return $this->getData('image');
    }

    /**
     * @inheritDoc
     */
    public function setImage(?string $image): void
    {
        $this->setData('image', $image);
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): ?int
    {
        return $this->setData('status');
    }

    /**
     * @inheritDoc
     */
    public function setStatus(?int $status): void
    {
        $this->setData('status', $status);
    }

    /**
     * @inheritDoc
     */
    public function getCanCollect(): ?int
    {
        return $this->getData('can_collect');
    }

    /**
     * @inheritDoc
     */
    public function setCanCollect(?int $canCollect): void
    {
        $this->setData('can_collect', $canCollect);
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->getData('description');
    }

    /**
     * @inheritDoc
     */
    public function setDescription(?string $description): void
    {
        $this->setData('description', $description);
    }

    /**
     * @inheritDoc
     */
    public function getOpenInfo(): ?string
    {
        return $this->getData('open_info');
    }

    /**
     * @inheritDoc
     */
    public function setOpenInfo(?string $openInfo): void
    {
        $this->setData('open_info', $openInfo);
    }

    /**
     * @inheritDoc
     */
    public function getStoreId(): ?int
    {
        return $this->getData('store_id');
    }

    /**
     * @inheritDoc
     */
    public function setStoreId(?int $storeId): void
    {
        $this->setData('store_id', $storeId);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData('created_at');
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->setData('created_at', $createdAt);
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData('updated_at');
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->setData('updated_at', $updatedAt);
    }
}
