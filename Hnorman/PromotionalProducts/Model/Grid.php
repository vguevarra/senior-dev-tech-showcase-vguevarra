<?php
declare(strict_types=1);
namespace Hnorman\PromotionalProducts\Model;

use Hnorman\PromotionalProducts\Api\Data\GridInterface;
use Magento\Framework\Model\AbstractModel;

class Grid extends AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'promo_products';

    /**
     * @var string
     */
    protected $_cacheTag = 'promo_products';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'promo_products';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Hnorman\PromotionalProducts\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::COL_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::COL_ID, $entityId);
    }

    /**
     * Get Sku.
     *
     * @return varchar
     */
    public function getSku()
    {
        return $this->getData(self::COL_SKU);
    }

    /**
     * Set Sku.
     */
    public function setSku($sku)
    {
        return $this->setData(self::COL_SKU, $sku);
    }

    /**
     * Get status.
     *
     * @return varchar
     */
    public function getStatus()
    {
        return $this->getData(self::COL_STATUS);
    }

    /**
     * Set Content.
     */
    public function setStatus($status)
    {
        return $this->setData(self::COL_STATUS, $status);
    }

    /**
     * Get price.
     *
     * @return varchar
     */
    public function getPrice()
    {
        return $this->getData(self::COL_PRICE);
    }

    /**
     * Set price.
     */
    public function setPrice($price)
    {
        return $this->setData(self::COL_PRICE, $price);
    }

    /**
     * Get price.
     *
     * @return varchar
     */
    public function getDiscount()
    {
        return $this->getData(self::COL_DISCOUNT);
    }

    /**
     * Set price.
     */
    public function setDiscount($discount)
    {
        return $this->setData(self::COL_DISCOUNT, $discount);
    }
    /**
     * Get Date Start.
     *
     * @return varchar
     */
    public function getDateStart()
    {
        return $this->getData(self::COL_DATE_START);
    }

    /**
     * Set Start Date.
     */
    public function setDateStart($dateStart)
    {
        return $this->setData(self::COL_DATE_START, $dateStart);
    }

    /**
     * Get Date Start.
     *
     * @return varchar
     */
    public function getDateEnd()
    {
        return $this->getData(self::COL_DATE_END);
    }

    /**
     * Set Start Date.
     */
    public function setDateEnd($dateEnd)
    {
        return $this->setData(self::COL_DATE_END, $dateEnd);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::COL_UPDATED_AT);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::COL_UPDATED_AT, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::COL_CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::COL_CREATED_AT, $createdAt);
    }
}
