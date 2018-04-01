<?php

namespace TCMP\OpCache\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Class Data
 *
 * @package TCMP\OpCache\Helper
 */
class Data extends AbstractHelper
{
    /**
     * Opcache Config
     *
     * @var $config
     */
    private $config;
    /**
     * OPCache Status
     *
     * @var $status
     */
    private $status;

    /**
     * @return bool
     */
    public function isInstalled()
    {
        if (!extension_loaded('Zend OPcache')) {
            return false;
        }
        return true;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        if (empty(ini_get('opcache.enable'))) {
            return false;
        }
        return true;
    }

    /**
     * Build OPcache version string
     *
     * @return string
     */
    public function getVersionString()
    {
        $productName = $this->getConfig()['version']['opcache_product_name'];
        $versionString = ' Version: ' . $this->getConfig()['version']['version'];
        return $productName . $versionString;
    }

    /**
     * Retrieve OpCache Config
     */
    public function getConfig()
    {
        if ($this->config === null) {
            $this->config = opcache_get_configuration();
        }
        return $this->config;
    }

    /**
     * OPcache Version Number
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->getConfig()['version']['version'];
    }

    /**
     * Blacklist Array
     *
     * @return mixed
     */
    public function getBlacklist()
    {
        return $this->getConfig()['blacklist'];
    }

    /**
     * OPcache configuration directives
     *
     * @return mixed
     */
    public function getDirectives()
    {
        return $this->getConfig()['directives'];
    }

    /**
     * @return mixed
     */
    public function getMemoryUsage()
    {
        return $this->getStatus()['memory_usage'];
    }

    /**
     * Retrieve OpCache Status Object
     */
    public function getStatus()
    {
        if ($this->status === null) {
            $this->status = opcache_get_status();
        }
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getScripts()
    {
        return $this->getStatus()['scripts'];
    }

    /**
     * @return mixed
     */
    public function getStatistics()
    {
        return $this->getStatus()['opcache_statistics'];
    }

    /**
     * @return mixed
     */
    public function getInternedStringsUsage()
    {
        return $this->getStatus()['interned_strings_usage'];
    }

    /**
     * @return mixed
     */
    public function getIsCacheFull()
    {
        return $this->getStatus()['cache_full'];
    }

    /**
     * @return mixed
     */
    public function getRestartPending()
    {
        return $this->getStatus()['restart_pending'];
    }

    /**
     * @return mixed
     */
    public function getRestartInProgress()
    {
        return $this->getStatus()['restart_in_progress'];
    }

    /**
     * Reset OpCache or Log Exception
     *
     * @return bool
     */
    public function resetOpCache()
    {
        try {
            opcache_reset();
            return true;
        } catch (\Exception $e) {
            $this->_logger->error($e->getMessage());
            return false;
        }
    }
}
