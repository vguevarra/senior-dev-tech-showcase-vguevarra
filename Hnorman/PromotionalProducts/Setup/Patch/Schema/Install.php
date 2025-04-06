<?php
declare(strict_types=1);

namespace Hnorman\PromotionalProducts\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class Install implements SchemaPatchInterface
{
    const TABLE_NAME  = "promo_products";
    const COL_ID  = "entity_id";
    const COL_STATUS  = "status";
    const COL_SKU  = "sku";
    const COL_PRICE  = "price";
    const COL_DISCOUNT  = "discount";
    const COL_STORE_IDS = "store_ids";
    const COL_DATE_START  = "date_start";
    const COL_DATE_END  = "date_end";
    const COL_CREATED_AT  = "created_at";
    const COL_UPDATED_AT  = "updated_at";


    // ID, SKU, Name, Price, and Promotion Status
    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    /**
     * __construct
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * {@inheritdoc}
     * @throws \Zend_Db_Exception
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $conn = $this->moduleDataSetup->getConnection();

        if (!$conn->isTableExists(self::TABLE_NAME)) {
            $adminGrid = $conn->newTable(self::TABLE_NAME)
                ->addColumn(
                    self::COL_ID,
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary'  => true
                    ]
                )->addColumn(
                    self::COL_STATUS,
                    Table::TYPE_BOOLEAN,
                    null,
                    [
                        'nullable' => false,
                        'default'  => 0
                    ]
                )->addColumn(
                    self::COL_SKU,
                    Table::TYPE_TEXT,
                    null,
                    [
                        'nullable' => true,
                        'comment'  => 'Product Sku'
                    ]
                )->addColumn(
                    self::COL_DISCOUNT,
                    Table::TYPE_FLOAT,
                    null,
                    [
                        'nullable' => true,
                        'comment'  => 'Product Price Discount'
                    ]
                )->addColumn(
                    self::COL_PRICE,
                    Table::TYPE_FLOAT,
                    null,
                    [
                        'nullable' => true,
                        'comment'  => 'Product Price'
                    ]
                )->addColumn(
                    self::COL_STORE_IDS,
                    Table::TYPE_TEXT,
                    null,
                    [
                        'nullable' => false,
                        'comment'  => 'Store Ids'
                    ]
                )->addColumn(
                    self::COL_DATE_START,
                    Table::TYPE_DATE,
                    255,
                    [
                        'nullable' => false,
                        'comment'  => 'Promo Start'
                    ]
                )->addColumn(
                    self::COL_DATE_END,
                    Table::TYPE_DATE,
                    255,
                    [
                        'nullable' => false,
                        'comment'  => 'Promo Ends'
                    ]
                )->addColumn(
                    self::COL_CREATED_AT,
                    Table::TYPE_TIMESTAMP,
                    255,
                    [
                        'nullable' => false,
                        'default'  => Table::TIMESTAMP_INIT,
                        'comment'  => 'Created At'
                    ]
                )->addColumn(
                    self::COL_UPDATED_AT,
                    Table::TYPE_TIMESTAMP,
                    255,
                    [
                        'nullable' => false,
                        'default'  => Table::TIMESTAMP_INIT_UPDATE,
                        'comment'  => 'Updated At'
                    ]
                )
                ->setOption('charset', 'utf8');

            $conn->createTable($adminGrid);
        }

        $this->moduleDataSetup->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
