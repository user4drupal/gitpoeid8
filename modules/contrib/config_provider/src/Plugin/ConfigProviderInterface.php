<?php

namespace Drupal\config_provider\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\config_provider\InMemoryStorage;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\ConfigManagerInterface;
use Drupal\Core\Config\StorageInterface;

/**
 * Defines an interface for Configuration provider plugins.
 */
interface ConfigProviderInterface extends PluginInspectionInterface {

  /**
   * Indicates whether the configuration items returned by the provider are
   * full as opposed to partials.
   *
   * @return bool
   *   TRUE if the configuration returned is full; otherwise, FALSE.
   */
  public function providesFullConfig();

  /**
   * Returns the configuration directory.
   *
   * @return string
   *   The configuration directory for this provider.
   */
  public function getDirectory();

  /**
   * Injects the active configuration storage.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The configuration factory.
   */
  public function setConfigFactory(ConfigFactoryInterface $config_factory);

  /**
   * Injects the active configuration storage.
   *
   * @param \Drupal\Core\Config\StorageInterface $storage
   *   The configuration storage to read configuration from.
   */
  public function setActiveStorages(StorageInterface $active_storage);

  /**
   * Injects the active configuration storage.
   *
   * @param \Drupal\Core\Config\ConfigManagerInterface $config_manager
   *   The configuration manager.
   */
  public function setConfigManager(ConfigManagerInterface $config_manager);

  /**
   * Adds configuration that can be installed.
   *
   * @param StorageInterface $storage
   *   The configuration storage to read configuration from.
   * @param string $collection
   *   The configuration collection to use.
   * @param string $prefix
   *   (optional) Limit to configuration starting with the provided string.
   * @param \Drupal\Core\Config\StorageInterface[] $profile_storages
   *   An array of storage interfaces containing profile configuration to check
   *   for overrides.
   *
   * @return array
   *   An array of configuration data read from the source storage keyed by the
   *   configuration object name.
   */
  public function addConfigToCreate(array &$config_to_create, StorageInterface $storage, $collection, $prefix = '', array $profile_storages = []);

  /**
   * Adds configuration to be installed.
   *
   * @param \Drupal\config_provider\InMemoryStorage $installable_config
   *   A storage for configuration to be added to.
   * @param \Drupal\Core\Extension\Extension[] $extensions
   *   (Optional) An associative array of Extension objects, keyed by extension
   *   name. If provided, data loaded will be limited to these extensions.
   */
  public function addInstallableConfig(InMemoryStorage $installable_config, array $extensions = []);

}
