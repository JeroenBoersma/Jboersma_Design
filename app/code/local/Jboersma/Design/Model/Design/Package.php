<?php
/**
 * Check
 *
 * @copyright (c) 2014, Jeroen Boersma
 * @author Jeroen Boersma <jeroen@jboersma.nl>
 */


/**
 * @category    Jboersma
 * @package     Jboersma_Design
 */
class Jboersma_Design_Model_Design_Package extends Mage_Core_Model_Design_Package
{

    const ENTERPRISE_PACKAGE = 'enterprise';

    /**
     * Dependencies
     *
     * @var array
     */
    static protected $_dependencies;

    /**
     * Check for files existence by specified scheme
     *
     * If fallback enabled, the first found file will be returned. Otherwise the base package / default theme file,
     *   regardless of found or not.
     * If disabled, the lookup won't be performed to spare filesystem calls.
     *
     * @param string $file
     * @param array &$params
     * @param array $fallbackScheme
     * @return string
     */
    protected function _fallback($file, array &$params, array $fallbackScheme = array(array()))
    {
        if ($this->_shouldFallback) {
            // Get and add dependency packages
            foreach($this->_getFallbackPages() as $dependency) {
                $fallbackScheme[] = $dependency;
            }
        }

        return parent::_fallback($file, $params, $fallbackScheme);
    }

    /**
     * Get fallback packages
     *
     * @return array
     */
    protected function _getFallbackPages() {

        if (self::$_dependencies) {
            return self::$_dependencies;
        }

        $storeDependenciesPackages = Mage::getStoreConfig('design/dependencies/package');

        $packages = array();

        if ($storeDependenciesPackages) {
            foreach(unserialize($storeDependenciesPackages) as $package) {
                $packages[$package['sort'] . '_' . $package['package']] = array(
                    '_package' => $package['package']
                );
            }
        }

        ksort($packages, SORT_NUMERIC);

        // Add Enterpise template by default
        if (Mage::getEdition() === Mage::EDITION_ENTERPRISE) {
            $packages[] = array(
                '_package' => Jboersma_Design_Model_Design_Package::ENTERPRISE_PACKAGE
            );
        }

        self::$_dependencies = array_values($packages);

        return self::$_dependencies;
    }

}
