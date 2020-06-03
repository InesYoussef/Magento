<?php
namespace Ajout\Attribut\Model\Product\Attribute\Source;

class VendeurId extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public function __construct(\Magento\Customer\Model\CustomerFactory $customerFactory, \Magento\Customer\Model\Customer $customers)
    {

        $this->_customerFactory = $customerFactory;
        $this->_customer = $customers;
        
    }//c'est la classe VendeurId que je l ai mait dans la source  ok      ok

    /**
     * Retrieve all options array
     *
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options)
        
        {
            $customers=$this->getCustomerCollection();
            $this->_options [] = ['label'=> '','value'=>''];
            foreach ($customers as $customer){
                $this->_options[] = ['label'=> $customer->getFirstname().' '.$customer->getLastname(),'value'=>$customer->getId()];
                }

        }
        return $this->_options;
    }
    public function getCustomerCollection()
    {   
        return $this->_customer
                ->getCollection()
               ->addAttributeToSelect("*")
               ->addAttributeToFilter('group_id', 2)
               ->load();

    } 

    	

    /*public function afterGet( \Magento\Catalog\Api\ProductRepositoryInterface $Productrepo, \Magento\Catalog\Api\Data\ProductInterface $Productinter )
    {
        $vendeur_id = $this->customDataRepository->get($Productinter->getId()); //pascal,u $VendeurId?
        $VendeurId = $Productinter->getVendeurId(); //Tape les commandes on vas vérifie,ok

        $VendeurId->setVendeurId($vendeur_id);
        $Productinter->setVendeurId($VendeurId);

        return $Productinter;
    }*/

    
}

