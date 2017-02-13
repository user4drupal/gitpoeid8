<?php
/**
 * @file
 * Contains \Drupal\hello\Plugin\Block\HelloBlock.
 */
namespace Drupal\hello\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Datetime\DateFormatter;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountProxy;

/**
 * Provides a hello block.
 *
 * @Block(
 *     id = "hello_block",
 *     admin_label = @Translation("HelloBlock!")
 *)
 */



class HelloBlock extends BlockBase implements ContainerFactoryPluginInterface{
  protected $dateformat;
  protected $serviceUser;
  /**
   * Implements Drupal\Core\Block\BlockBase::build().
   */
  public function __construct(DateFormatter $date_format,AccountProxy $service_user, array $configuration, $plugin_id, $plugin_definition)
  {
    $this->dateformat = $date_format;
    $this->serviceUser = $service_user;
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    
  }
  
  /**
   * @param ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @return static
   */
  public static function create(ContainerInterface $container ,array $configuration, $plugin_id, $plugin_definition)
  {
    return new static(
      $container->get('date.formatter'),
      $container->get('current_user'),
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }
  
  /**
   * @return array
   */
  public function build(){
    
    $date = $this->dateformat->format(time(), 'html_time' );
    $user = $this->serviceUser->getDisplayName();
    $bloc = [$markup = $this->t('Welcome @name it is @date', array('@date' => $date, '@name' => $user))];
    
    return array(
      '#markup' => $markup,
      '#cache' => array(
        'keys' => ['hello'],
        'max-age' => '1000',
      ),
    );
  }
}

