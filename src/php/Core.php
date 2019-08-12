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
     * Plugin Directory
     *
     * @var string
     */
    public $pluginDir;

    /**
     * Plugin Url
     *
     * @var string
     */
    public $pluginUrl;

    /**
     * Plugin File
     *
     * @var string
     */
    public $pluginFile;

    /**
     * Plugin Version
     *
     * @var string
     */
    public $pluginVersion;

    /**
     * Class constructor
     *
     * @param string $pluginDir
     * @param string $pluginUrl
     * @param string $pluginFile
     * @param string $pluginVersion
     */
    public function __construct(
        string $pluginDir,
        string $pluginUrl,
        string $pluginFile,
        string $pluginVersion = '1.0.0'
    ) {
        $this->pluginDir = $pluginDir;
        $this->pluginUrl = $pluginUrl;
        $this->pluginFile = $pluginFile;
        $this->pluginVersion = $pluginVersion;
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
