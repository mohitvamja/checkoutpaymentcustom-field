<?php
namespace Sale\Paymentcomment\Model\ResourceModel\Order\Grid;
 
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as CoreFetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as CoreEntityFactory;
use Magento\Framework\Event\ManagerInterface as CoreEventManager;
use Magento\Sales\Model\ResourceModel\Order\Grid\Collection as CoreSalesGrid;
use Psr\Log\LoggerInterface as Logger;
 
/**
 * RH Order Grid Collection
 */
class Collection extends CoreSalesGrid
{
    /**
     * @param CoreEntityFactory $entityFactory
     * @param Logger            $logger       
     * @param CoreFetchStrategy $fetchStrategy
     * @param CoreEventManager  $eventManager 
     * @param string            $mainTable    
     * @param string            $resourceModel
     */
    public function __construct(
        CoreEntityFactory $entityFactory,
        Logger $logger,
        CoreFetchStrategy $fetchStrategy,
        CoreEventManager $eventManager,
        $mainTable = 'sales_order_grid',
        $resourceModel = \Magento\Sales\Model\ResourceModel\Order::class
    ) {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel);
    }
 
    protected function _renderFiltersBefore()
    {
        $billingAliasName = 'billing_o_a';
        $joinTable = $this->getTable('sales_order');
        // $this->getSelect()->joinLeft(
        //     $joinTable,
        //     'main_table.entity_id = sales_order.entity_id',
        //     ['paycomment']
        // );

        $this->addFilterToMap(
            'billing_paycomment',
            $billingAliasName . '.paycomment'
        )->addFilterToMap(
            'billing_paycommenttextarea',
            $billingAliasName . '.paycommenttextarea'
        )->addFilterToMap(
            'billing_yesno',
            $billingAliasName . '.yesno'
        );

        $this->getSelect()->joinLeft(
             [$billingAliasName => $joinTable],
             'main_table.entity_id = sales_order.entity_id',
              [
                $billingAliasName . '.paycomment',
                $billingAliasName . '.paycommenttextarea',
                $billingAliasName . '.yesno'
            ]
        );
        // $this->getSelect()->joinLeft(
        //     $joinTable,
        //     'main_table.entity_id = sales_order.entity_id',
        //     ['paycommenttextarea']
        // );
        // $this->getSelect()->joinLeft(
        //     $joinTable,
        //     'main_table.entity_id = sales_order.entity_id',
        //     ['yesno']
        // );
       //echo $query =  $this->getSelect()__toString(); die('test');
        parent::_renderFiltersBefore();
    }
}