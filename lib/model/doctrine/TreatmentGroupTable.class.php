<?php

/**
 * TreatmentGroupTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TreatmentGroupTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TreatmentGroupTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TreatmentGroup');
    }

    /**
     * function getTreatmentGroups()
     * -----------------------------
     * fetch the treatment groups
     *
     * @return mixed DoctrineCollection of treatment groups or boolean if none
     */
	public static function getTreatmentGroups()
	{
        // build the DQL
		$q = Doctrine_Core::getTable('TreatmentGroup')->createQuery('t');
		$q->orderBy('t.display_order ASC');

        // execute the DQL
		$treatment_groups = $q->execute();
		foreach($treatment_groups as $treatment_group) {			
		  $treatment_group_ar[$treatment_group->getId()] = $treatment_group;
		}
        
        // if we have treatment groups then return them, otherwise return false
		if(count($treatment_group_ar)) {
			return $treatment_group_ar;
		} else {
			return false;
		}
	}
}