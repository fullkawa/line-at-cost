<?php
namespace LineAtCost\Exception;

/**
 * 不正なUsageが渡された場合の例外
 *
 * @author furukawa
 */
class InvalidUsageException extends \Exception
{

    public function __construct($message = null, $code = null, $previous = null)
    {
        parent::__construct($message = null, $code = null, $previous = null);
    }
}

