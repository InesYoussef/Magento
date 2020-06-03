<?php
/* File: app/code/Atwix/OrderFeedback/Plugin/OrderRepositoryPlugin.php */
namespace Atwix\OrderFeedback\Plugin;
use Magento\Catalog\Api\Data\CatalogExtensionFactory;
use Magento\Catalog\Api\Data\CatalogExtensionInterface;
use Magento\Catalog\Api\Data\CatalogInterface;
use Magento\Catalog\Api\Data\CatalogSearchResultInterface;
use Magento\Catalog\Api\CatalogRepositoryInterface;
/**
 * Class OrderRepositoryPlugin
 */
class CatalogRepositoryPlugin
{
    /**
     * Order feedback field name
     */
    const FIELD_NAME = 'price_feedback';
    /**
     * Order Extension Attributes Factory
     *
     * @var CatalogExtensionFactory
     */
    protected $extensionFactory;
    /**
     * OrderRepositoryPlugin constructor
     *
     * @param CatalogExtensionFactory $extensionFactory
     */
    public function __construct(CatalogExtensionFactory $extensionFactory)
    {
        $this->extensionFactory = $extensionFactory;
    }
    /**
     * Add "customer_feedback" extension attribute to order data object to make it accessible in API data
     *
     * @param CatalogRepositoryInterface $subject
     * @param CatalogInterface $order
     *
     * @return CatalogInterface
     */
    public function afterGet(CatalogRepositoryInterface $subject, CatalogInterface $order)
    {
        $priceFeedback = $catalog->getData(self::FIELD_NAME);
        $extensionAttributes = $catalog->getExtensionAttributes();
        $extensionAttributes = $extensionAttributes ? $extensionAttributes : $this->extensionFactory->create();
        $extensionAttributes->setCustomerFeedback($priceFeedback);
        $catalog->setExtensionAttributes($extensionAttributes);
        return $catalog;
    }
    /**
     * Add "customer_feedback" extension attribute to order data object to make it accessible in API data
     *
     * @param CatalogRepositoryInterface $subject
     * @param CatalogearchResultInterface $searchResult
     *
     * @return CatalogSearchResultInterface
     */
    public function afterGetList(CatalogRepositoryInterface $subject, CatalogSearchResultInterface $searchResult)
    {
        $catalog= $searchResult->getItems();
        foreach ($catalog as &$catalog) {
            $priceFeedback = $order->getData(self::FIELD_NAME);
            $extensionAttributes = $catalog->getExtensionAttributes();
            $extensionAttributes = $extensionAttributes ? $extensionAttributes : $this->extensionFactory->create();
            $extensionAttributes->setPriceFeedback($priceFeedback);
            $price->setExtensionAttributes($extensionAttributes);
        }
        return $searchResult;
    }
}
