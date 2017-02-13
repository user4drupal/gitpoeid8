<?php
/**
 * @file
 * Contains \Drupal\hello\Plugin\Block\HelloBlockSessions.
 */
namespace Drupal\hello\Plugin\Block;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a Hello Session block.
 *
 * @Block(
 *     id = "hello_block_session",
 *     admin_label = @Translation("HelloBlockSession!")
 *)
 */
class HelloBlockSessions extends BlockBase
{
  protected function blockAccess(AccountInterface $account)
  {
    if ($account->hasPermission('access hello')) {
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
  }
  
  
  public function build(){
    $database = \Drupal::database();
    $num_session = $database->select('sessions', 'S')
      ->fields('s', array('uid'))
      ->countQuery()
      ->execute()
      ->fetchField();
    $bloc = [$markup = t('Il y a actuelement @sessions sessions', array('@sessions' => $num_session))];
    return array(
      '#markup' => $markup,
      '#cache' => array(
        'keys' => ['makroute'],
        'max-age' => '10',
      ),
    );
  }
}
