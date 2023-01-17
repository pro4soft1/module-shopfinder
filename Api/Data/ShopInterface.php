<?php

namespace Sf\Shopfinder\Api\Data;

interface ShopInterface
{
    /**
     * String constants for property names
     */
    public const ENTITY_ID = "entity_id";
    public const NAME = "name";
    public const IDENTIFIER = "identifier";
    public const ADDRESS = "address";
    public const ADDRESS_2 = "address_2";
    public const CITY = "city";
    public const COUNTRY = "country";
    public const STATE = "state";
    public const ZIP = "zip";
    public const PHONE = "phone";
    public const LATITUDE = "latitude";
    public const LONGITUDE = "longitude";
    public const EMAIL = "email";
    public const IMAGE = "image";
    public const STATUS = "status";
    public const CAN_COLLECT = "can_collect";
    public const DESCRIPTION = "description";
    public const OPEN_INFO = "open_info";
    public const STORE_ID = "store_id";
    public const CREATED_AT = "created_at";
    public const UPDATED_AT = "updated_at";

    /**
     * Getter for EntityId.
     *
     * @return int|null
     */
    public function getShopId(): ?int;



    /**
     * Getter for Name.
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Setter for Name.
     *
     * @param string|null $name
     *
     * @return void
     */
    public function setName(?string $name): void;

    /**
     * Getter for Identifier.
     *
     * @return string|null
     */
    public function getIdentifier(): ?string;

    /**
     * Setter for Identifier.
     *
     * @param string|null $identifier
     *
     * @return void
     */
    public function setIdentifier(?string $identifier): void;

    /**
     * Getter for Address.
     *
     * @return string|null
     */
    public function getAddress(): ?string;

    /**
     * Setter for Address.
     *
     * @param string|null $address
     *
     * @return void
     */
    public function setAddress(?string $address): void;

    /**
     * Getter for Address2.
     *
     * @return string|null
     */
    public function getAddress2(): ?string;

    /**
     * Setter for Address2.
     *
     * @param string|null $address2
     *
     * @return void
     */
    public function setAddress2(?string $address2): void;

    /**
     * Getter for City.
     *
     * @return string|null
     */
    public function getCity(): ?string;

    /**
     * Setter for City.
     *
     * @param string|null $city
     *
     * @return void
     */
    public function setCity(?string $city): void;

    /**
     * Getter for Country.
     *
     * @return string|null
     */
    public function getCountry(): ?string;

    /**
     * Setter for Country.
     *
     * @param string|null $country
     *
     * @return void
     */
    public function setCountry(?string $country): void;

    /**
     * Getter for State.
     *
     * @return string|null
     */
    public function getState(): ?string;

    /**
     * Setter for State.
     *
     * @param string|null $state
     *
     * @return void
     */
    public function setState(?string $state): void;

    /**
     * Getter for Zip.
     *
     * @return int|null
     */
    public function getZip(): ?int;

    /**
     * Setter for Zip.
     *
     * @param int|null $zip
     *
     * @return void
     */
    public function setZip(?int $zip): void;

    /**
     * Getter for Phone.
     *
     * @return int|null
     */
    public function getPhone(): ?int;

    /**
     * Setter for Phone.
     *
     * @param int|null $phone
     *
     * @return void
     */
    public function setPhone(?int $phone): void;

    /**
     * Getter for Latitude.
     *
     * @return int|null
     */
    public function getLatitude(): ?int;

    /**
     * Setter for Latitude.
     *
     * @param int|null $latitude
     *
     * @return void
     */
    public function setLatitude(?int $latitude): void;

    /**
     * Getter for Longitude.
     *
     * @return int|null
     */
    public function getLongitude(): ?int;

    /**
     * Setter for Longitude.
     *
     * @param int|null $longitude
     *
     * @return void
     */
    public function setLongitude(?int $longitude): void;

    /**
     * Getter for Email.
     *
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * Setter for Email.
     *
     * @param string|null $email
     *
     * @return void
     */
    public function setEmail(?string $email): void;

    /**
     * Getter for Image.
     *
     * @return string|null|object
     */
    public function getImage(): ?string;

    /**
     * Setter for Image.
     *
     * @param string|null $image
     *
     * @return void
     */
    public function setImage(?string $image): void;

    /**
     * Getter for Status.
     *
     * @return int|null
     */
    public function getStatus(): ?int;

    /**
     * Setter for Status.
     *
     * @param int|null $status
     *
     * @return void
     */
    public function setStatus(?int $status): void;

    /**
     * Getter for CanCollect.
     *
     * @return int|null
     */
    public function getCanCollect(): ?int;

    /**
     * Setter for CanCollect.
     *
     * @param int|null $canCollect
     *
     * @return void
     */
    public function setCanCollect(?int $canCollect): void;

    /**
     * Getter for Description.
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Setter for Description.
     *
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription(?string $description): void;

    /**
     * Getter for OpenInfo.
     *
     * @return string|null
     */
    public function getOpenInfo(): ?string;

    /**
     * Setter for OpenInfo.
     *
     * @param string|null $openInfo
     *
     * @return void
     */
    public function setOpenInfo(?string $openInfo): void;

    /**
     * Getter for StoreId.
     *
     * @return int|null
     */
    public function getStoreId(): ?int;

    /**
     * Setter for StoreId.
     *
     * @param int|null $storeId
     *
     * @return void
     */
    public function setStoreId(?int $storeId): void;

    /**
     * Getter for CreatedAt.
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * Setter for CreatedAt.
     *
     * @param string|null $createdAt
     *
     * @return void
     */
    public function setCreatedAt(?string $createdAt): void;

    /**
     * Getter for UpdatedAt.
     *
     * @return string|null
     */
    public function getUpdatedAt(): ?string;

    /**
     * Setter for UpdatedAt.
     *
     * @param string|null $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt(?string $updatedAt): void;
}
