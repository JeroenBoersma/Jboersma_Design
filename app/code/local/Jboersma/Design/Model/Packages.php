<?php
/**
 * Get packages
 *
 * @copyright (c) 2014, Jeroen Boersma
 * @author Jeroen Boersma <jeroen@jboersma.nl>
 */

/**
 * @category    Jboersma
 * @package     Jboersma_Design
 */
class Jboersma_Design_Model_Packages
{
    protected $_options;

    public function toOptionArray()
    {
        if (!$this->_options) {

            $packages = $this->getPackageList();

            $dependPackages = array();
            foreach ($packages as $package) {

                $dependPackages[] = array(
                    'value' => $package,
                    'label' => $package
                );
            }

            $this->_options = $dependPackages;
        }

        return $this->_options;
    }

    /**
     * Get packages
     *
     * @return array
     */
    public function getPackageList()
    {
        $designPackage = Mage::getSingleton('core/design_package');
        /* @var $designPackage Mage_Core_Model_Design_Package */

        $packages = $designPackage->getPackageList();

        $dependPackages = array();
        foreach ($packages as $package) {

            if (Mage_Core_Model_Design_Package::BASE_PACKAGE === $package) {
                // Do not add base
                continue;
            } else if (Jboersma_Design_Model_Design_Package::ENTERPRISE_PACKAGE === $package) {
                // Do not add enterprise, it is added by default for enterprise installations
                continue;
            } else if (!in_array(Mage_Core_Model_Design_Package::DEFAULT_THEME, $designPackage->getThemeList($package))) {
                // No default theme in this package
                continue;
            }

            $dependPackages[] = $package;
        }

        return $dependPackages;
    }
}
