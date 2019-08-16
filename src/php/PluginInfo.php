<?php
declare(strict_types=1);

namespace Plugin;

/**
 * Plugin Information
 *
 * Extracts information about a plugin and stores it in properties.
 */
class PluginInfo
{
    /**
     * Plugin name
     *
     * @var string
     */
    public $name;

    /**
     * Plugin description
     *
     * @var string
     */
    public $description;

    /**
     * Plugin version
     *
     * @var string
     */
    public $version;

    /**
     * Plugin path
     *
     * @var string
     */
    public $path;
    
    /**
     * Plugin url
     *
     * @var string
     */
    public $url;

    /**
     * Class constructor
     *
     * Set up the object based off the provided file.
     *
     * @param string $pluginFile
     */
    public function __construct(string $pluginFile)
    {
        $this->pluginFile = $pluginFile;
        $this->extractPluginInfo()->setPaths();
    }

    /**
     * Extract plugin information from get_plugin_data()
     *
     * @see https://developer.wordpress.org/reference/functions/get_plugin_data/
     * @return self
     */
    private function extractPluginInfo(): self
    {
        $wpData = get_plugin_data($this->pluginFile, false, false);
        $this->name         = $wpData['Name'];
        $this->description  = $wpData['Description'];
        $this->version      = $wpData['Version'];
        return $this;
    }

    /**
     * Set path & url for plugin.
     *
     * @return self
     */
    private function setPaths(): self
    {
        $this->path = plugin_dir_path($this->pluginFile);
        $this->url = plugins_url('', $this->pluginFile);
        return $this;
    }
}
