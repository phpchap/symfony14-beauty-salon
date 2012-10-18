<?php

/**
 * Category
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Category extends BaseCategory
{
    /**
     * checks whether this category has extra info to display
     * @return boolean
     */
	public function hasExtraInfo()
	{
		if($this->getExtraInfo()) {
			return true;
		} else {
			return false;			
		}
	}
	/**
     * checks whether this category has products
     * @return boolean
     */
	public function hasProducts()
	{
		if($this->getProducts()){
			return true;
		} else {
			return false;
		}
	}

    /**
     * fetch the treatment group this category belongs to
     * @return mixed Category object / boolean if none found
     */
	public function getGroup()
	{
		if($this->getTreatmentGroupId()) {

            // build the DQL
			$q = Doctrine_Core::getTable('TreatmentGroup')->createQuery('tg');
			$q->addWhere('tg.id='.$this->getTreatmentGroupId());

            // run the query
			$treatment_group = $q->execute();

            // if we have results then return it otherwise return false
			if($treatment_group->count()>0) {
                // return the treatment group
				return $treatment_group->getFirst()->getName();
			} else {
				return false;
			}
		} else {
			return false;
		}	
	}

    /**
     * fetch the products that belong to this category
     * @return mixed
     */
	public function getProducts()
	{
		if($this->getId()) {

            // build the DQL
			$q = Doctrine_Core::getTable('Product')->createQuery('p');
			$q->addWhere('p.is_available=1');
			$q->addWhere('p.category_id='.$this->getId());

            // run the DQL
			$products = $q->execute();

            // if we have results, then return them otherwise return false
			if($products->count()>0) {

                // return the products
				return $products;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}	
}