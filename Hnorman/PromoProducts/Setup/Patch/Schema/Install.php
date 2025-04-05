<?php

namespace Magesan\Extension\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class Install implements SchemaPatchInterface
{
    const COLUMN_NAME = "custom";
    const TABLE_NAME  = "promo_products";

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
     */
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $setupConnection = $this->moduleDataSetup->getConnection();
        $setupConnection->addColumn(
            $this->moduleDataSetup->getTable(self::TABLE_NAME),
            self::COLUMN_NAME,
            [
                "type"     => Table::TYPE_BOOLEAN,
                "comment"  => "Custom",
                "label"    => "Custom",
                "nullable" => true,
                "default"  => 0,
            ]
        );

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
