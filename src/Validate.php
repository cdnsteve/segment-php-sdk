<?php

namespace CdnSteve\Segment;

class ValidationException extends \Exception{}

class Validate {

  /**
   * Validate common parameters between all request types.
   * @param array $message
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function common(array $message) {
    // Check userId or anonymousId are set.
    if (!isset($message['userId']) && !isset($message['anonymousId']))
    {
      throw new ValidationException('identify validation: Required key missing for userId or anonymousId.');
    }

    // Check userId or anonymousId are String data type.
    if (isset($message['userId']) && !is_string($message['userId']))
    {
      throw new ValidationException('identify validation: userId must be a string');
    }
    if (isset($message['anonymousId']) && !is_string($message['anonymousId']))
    {
      throw new ValidationException('identify validation: anonymousId must be a string');
    }
  }

  /**
   * Validate identify requests.
   * @param array $message
   * @throws \CdnSteve\Segment\ValidationException
   */
	public function identify(array $message) {
    /**
     * @anonymousId String, optional.
     * @userId String, required. UserId OR anonymousId required.
     * @context Array, optional.
     * @integrations Array, optional.
     * @timestamp Date, optional.
     * @traits Array, optional.
     */
    // Validate common params.
    $this->common($message);


	}

  /**
   * Validate group requests.
   * @param array $message
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function group(array $message) {
    /**
     * @anonymousId String, optional.
     * @userId String, required. UserId OR anonymousId required.
     * @groupId String, required.
     * @context Array, optional.
     * @integrations Array, optional.
     * @timestamp Date, optional.
     * @traits Array, optional.
     */
    // Validate common params.
    $this->common($message);

    if (!isset($message['groupId'])) {
      throw new ValidationException('group validation: groupId is required');
    }

    // Check event is String data type.
    if (isset($message['group']) && !is_string($message['group']))
    {
      throw new ValidationException('group validation: groupId must be a string');
    }
  }

  /**
   * Validate track requests.
   * @param array $message
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function track(array $message) {
    /**
     * @anonymousId String, optional.
     * @userId String, required. UserId OR anonymousId required.
     * @event String, required.
     * @context Array, optional.
     * @integrations Array, optional.
     * @timestamp Date, optional.
     * @properties Array, optional.
     */
    // Validate common params.
    $this->common($message);

    if (!isset($message['event'])) {
      throw new ValidationException('track validation: event is required');
    }

    // Check event is String data type.
    if (isset($message['event']) && !is_string($message['event']))
    {
      throw new ValidationException('track validation: event must be a string');
    }

  }

  /**
   * Validate page requests.
   * @param array $message
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function page(array $message) {
    /**
     * @anonymousId String, optional.
     * @userId String, required. UserId OR anonymousId required.
     * @context Array, optional.
     * @name String, optional.
     * @integrations Array, optional.
     * @timestamp Date, optional.
     * @properties Array, optional.
     */
    // Validate common params.
    $this->common($message);
  }

  /**
   * Validate alias requests.
   * @param array $message
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function alias(array $message) {
    /**
     * @anonymousId String, optional.
     * @userId String, required. UserId OR anonymousId required.
     * @context Array, optional.
     * @integrations Array, optional.
     * @timestamp Date, optional.
     * @previousId String, required.
     */
    // Validate common params.
    $this->common($message);

    if (!isset($message['previousId'])) {
      throw new ValidationException('alias validation: previousId is required');
    }

    // Check event is String data type.
    if (isset($message['previousId']) && !is_string($message['previousId']))
    {
      throw new ValidationException('alias validation: previousId must be a string');
    }

  }

  /**
   * Validate import requests.
   * @param array $message
   * @throws \CdnSteve\Segment\ValidationException
   */
  public function import(array $message) {
    /**
     * @batch Array, required. Each call must include.
     * @context Array, optional.
     * @integrations Array, optional.
     */

    if (!isset($message['batch'])) {
      throw new ValidationException('import validation: batch is required');
    }
  }

  /**
   * Add library metadata to message
   * @param array $message
   * @return array $message with library tags.
   */
  public function addLibrary(array $message)
  {
    // Add SDK info for requests.
    $message['context']['library'] = [
      'name' => Segment::PROJECT,
      'version' => Segment::VERSION
    ];
    return $message;
  }

}

