<?php
namespace \Router\Exception;

class NamespaceFinderException extends Exception
{

    function __construct($message, $code = 0)
    {
        parent::__construct($message,$code);
    }
}
