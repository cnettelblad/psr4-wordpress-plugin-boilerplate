<?php
declare(strict_type=1);

namespace Plugin;

/**
 * Plugin core class
 *
 * Other classes can benefit from extending this in
 * order to access plugin directory, url and version.
 */
class Core
{
    /**
     * Plugin Information
     *
     * @var PluginInfo
     */
    public $pluginInfo;

    /**
     * Class constructor
     *
     * @param PluginInfo $pluginInfo
     */
    public function __construct(PluginInfo $pluginInfo)
    {
        $this->pluginInfo = $pluginInfo;
    }

    /**
     * Initializes the plugin
     *
     * Runs admin functionality when active within
     * wp-admin and guest functionality otherwise.
     *
     * @return void
     */
    public function init(): void
    {
        if (is_admin()) {
            $this->runAdmin();
            return;
        }
        $this->runGuest();
    }

    /**
     * Instantiates Admin functionality.
     *
     * @return void
     */
    public function runAdmin(): void
    {
        register_activation_hook($this->File, [$this, 'activate']);
        register_deactivation_hook($this->File, [$this, 'deactivate']);
    }

    /**
     * Instantiates Guest functionality.
     *
     * @return void
     */
    public function runGuest(): void
    {
        // Guest functionality.
    }

    /**
     * Activate plugin, run migrations,
     * add rewrite rules etc.
     *
     * @return void
     */
    public function activate(): void
    {
        // Activation logic.
    }

    /**
     * Deactivate plugin, remove tables,
     * flush rewrite rules etc.
     *
     * @return void
     */
    public function deactivate(): void
    {
        // Deactivation logic.
    }
}
