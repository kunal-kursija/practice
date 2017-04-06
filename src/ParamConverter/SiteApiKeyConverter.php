<?php

namespace Drupal\practice\ParamConverter;

use Drupal\Core\ParamConverter\ParamConverterInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Route;

/**
 * Class SiteApiKeyConverter.
 *
 * @package Drupal\practice\ParamConverter
 */
class SiteApiKeyConverter implements ParamConverterInterface {

  /**
   * The config factory service.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * SiteApiKeyConverter constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $configFactory
   *   The config factory.
   */
  public function __construct(ConfigFactoryInterface $configFactory) {
    $this->configFactory = $configFactory;
  }

  /**
   * {@inheritdoc}
   */
  public function convert($value, $definition, $name, array $defaults) {
    // We must use 'convert' as the name of function as this is defined by an
    // Interface.
    // Return Value when SiteApiKey is same as URL argument.
    if ($value == $this->configFactory->get('practice.settings')->get('siteapikey')) {
      return $value;
    }
    // Throw Exception if we have different siteapi key in URL.
    throw new AccessDeniedHttpException();
  }

  /**
   * {@inheritdoc}
   */
  public function applies($definition, $name, Route $route) {
    // We must use 'applies' as the name of function as this is defined by an
    // Interface.
    if (!empty($definition['type']) && $definition['type'] == 'siteapikey') {
      return TRUE;
    }
    return FALSE;
  }

}
