<?php
namespace Grid\Fournisseur\Block;

class Customer extends \Magento\Framework\View\Element\Template
{

  protected $groupCollection;  


  public function __construct(
     
        \Magento\Customer\Model\ResourceModel\Group\CollectionFactory $groupCollection

    ) {


        $this->groupCollection = $groupCollection;
     
    }
    public function getCustomerGroup()
    {
       
        return $this->groupCollection->create()->toOptionArray();
    }

}
