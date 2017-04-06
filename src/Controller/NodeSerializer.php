<?php

namespace Drupal\practice\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class NodeSerializer.
 *
 * @package Drupal\practice\Controller
 */
class NodeSerializer extends ControllerBase {

  /**
   * The Serializer.
   *
   * @var \Symfony\Component\Serializer\SerializerInterface
   *   Serializer Dependency will be stored inside this.
   */
  protected $serializer;

  /**
   * NodeSerializer constructor.
   *
   * @param \Symfony\Component\Serializer\SerializerInterface $serializerInterface
   *   Dependency.
   */
  public function __construct(SerializerInterface $serializerInterface) {
    // Store the serializer instance inside the current Class Object.
    $this->serializer = $serializerInterface;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    // Loading the service 'serializer'(defined by serialization module) in the
    // Container.
    return new static(
      $container->get('serializer')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getJson(Node $node) {
    // If node is not of type PAGE, Throw Access Denied Exception.
    if ($node->getType() != 'page') {
      throw new AccessDeniedHttpException();
    }
    // We are using serialize function of serializer Object.
    // This function follows following process:
    // Step 1: Converts the Node Object into an Normalized Array.
    // Step 2: Converts The Normalized Array into Json Format(Our Case).
    $serializedNode = $this->serializer->serialize($node, 'json');
    // Build Output.
    $build = [
      '#type' => 'markup',
      '#markup' => $serializedNode,
    ];
    // Return the json markup.
    return $build;
  }

  /**
   * Returns Page Title.
   *
   * @return string
   *   Page Title.
   */
  public function getPageTitle() {
    return 'Node Serializer';
  }

}
