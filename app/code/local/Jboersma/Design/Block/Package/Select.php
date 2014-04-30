<?php
/**
 * System package select
 *
 * @copyright (c) 2014, Jeroen Boersma
 * @author Jeroen Boersma <jeroen@jboersma.nl>
 */


/**
 * @category    Jboersma
 * @package     Jboersma_Design
 */
class Jboersma_Design_Block_Package_Select extends Mage_Core_Block_Abstract
{


    protected function _toHtml()
    {
        $availablePackages = Mage::getSingleton('jboersma_design/packages')
                ->toOptionArray();

        $options = array();

        foreach ($availablePackages as $availablePackage) {
            $options[] = '<option value="' . $availablePackage['value'] . '">' . $availablePackage['label'] . '</option>';
        }

        $inputName = $this->getInputName();
        $columnName = $this->getColumnName();
        $column = $this->getColumn();

        return '<select id="select_' . $inputName . '" name="' . $inputName . '"' .
            ($column['size'] ? 'size="' . $column['size'] . '"' : '') . ' class="' .
            (isset($column['class']) ? $column['class'] : 'input-text') . '"'.
            (isset($column['style']) ? ' style="'.$column['style'] . '"' : '') . '>' . implode('', $options) . '</select>'
                . '<script type="text/javascript>'
                . '(function(i, v){document.getElementById("select_" + i).value = v;})("' . $inputName . '", "#{' . $columnName . '}")'
                . "</' + 'script>";
    }


}

