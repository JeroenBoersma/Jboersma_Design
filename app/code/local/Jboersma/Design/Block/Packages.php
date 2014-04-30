<?php
/**
 * System settings
 *
 * @copyright (c) 2014, Jeroen Boersma
 * @author Jeroen Boersma <jeroen@jboersma.nl>
 */


/**
 * @category    Jboersma
 * @package     Jboersma_Design
 */
class Jboersma_Design_Block_Packages extends Mage_Adminhtml_Block_System_Config_Form_Field_Array_Abstract
{
    public function __construct()
    {
        $this->addColumn('package', array(
            'label' => Mage::helper('core')->__('Package'),
            'style' => 'width:120px',
            'renderer' => Mage::getBlockSingleton('jboersma_design/package_select')
        ));
        $this->addColumn('sort', array(
            'label' => Mage::helper('catalog')->__('Position'),
            'style' => 'width:120px',
        ));
        $this->_addAfter = false;
        $this->_addButtonLabel = Mage::helper('adminhtml')->__('Add');
        parent::__construct();
    }

}
