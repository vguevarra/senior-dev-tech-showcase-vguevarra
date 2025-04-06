<?php
declare(strict_types=1);
namespace Hnorman\PromotionalProducts\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */


    const TABLE_NAME  = "promo_products";
    const COL_ID  = "entity_id";
    const COL_STATUS  = "status";
    const COL_SKU  = "sku";
    const COL_PRICE  = "price";
    const COL_DISCOUNT  = "discount";
    // const COL_STORE_IDS = "store_ids";
    const COL_DATE_START  = "date_start";
    const COL_DATE_END  = "date_end";
    const COL_CREATED_AT  = "created_at";
    const COL_UPDATED_AT  = "updated_at";

   /**
    * Get EntityId.
    *
    * @return int
    */
    public function getEntityId();

   /**
    * Set EntityId.
    */
    public function setEntityId($entityId);

   /**
    * Get Sku.
    *
    * @return varchar
    */
    public function getSku();

   /**
    * Set Sku.
    */
    public function setSku($sku);

   /**
    * Get Status.
    *
    * @return varchar
    */
    public function getStatus();

   /**
    * Set Status.
    */
    public function setStatus($status);

    /*
     * set price
     *
     */
    public function getPrice();

    /*
     * Get price
     */
    public function setPrice($price);


    public function getDiscount();

    /*
     * Get price
     */
    public function setDiscount($discount);


   /**
    * Get Date start.
    *
    * @return varchar
    */
    public function getDateStart();

   /**
    * Set date start.
    */
    public function setDateStart($dateStart);

    /**
     * Get Date end.
     *
     * @return varchar
     */
    public function getDateEnd();

    /**
     * Set Date end.
     */
    public function setDateEnd($dateEnd);

   /**
    * Get UpdateTime.
    *
    * @return varchar
    */
    public function getUpdateTime();

   /**
    * Set UpdateTime.
    */
    public function setUpdateTime($updateTime);

   /**
    * Get CreatedAt.
    *
    * @return varchar
    */
    public function getCreatedAt();

   /**
    * Set CreatedAt.
    */
    public function setCreatedAt($createdAt);
}
