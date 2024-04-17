<?php

namespace App\Exceptions;

use Exception;


class AmountException extends Exception
{
    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }
}
