<?php

namespace Sge\Service;

class Sge
{
    /**
     * @return mixed
     */
    public function init()
    {
        return set_error_handler(array($this, 'error_handler'));
    }

    /**
     * @param int    $error_handler
     * @param string $err_msg
     * @param string $err_file
     * @param int    $err_line
     * @param array  $err_context
     * 
     * @throws \Sge\Exception\ErrorException
     * @throws \Sge\Exception\WarningException
     * @throws \Sge\Exception\ParseException
     * @throws \Sge\Exception\NoticeException
     * @throws \Sge\Exception\CoreErrorException
     * @throws \Sge\Exception\CoreWarningException
     * @throws \Sge\Exception\CompileErrorException
     * @throws \Sge\Exception\UserErrorException
     * @throws \Sge\Exception\UserWarningException
     * @throws \Sge\Exception\UserNoticeException
     * @throws \Sge\Exception\StrictException
     * @throws \Sge\Exception\RecoverableErrorException
     * @throws \Sge\Exception\DeprecatedException
     * @throws \Sge\Exception\UserDeprecatedException
     *
     * @return bool
     */
    public function error_handler($error_handler, $err_msg, $err_file, $err_line, array $err_context)
    {
        if (0 === error_reporting()) {
            return false;
        }
        switch ($error_handler) {
            case E_ERROR:
                throw new \Sge\Exception\ErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_WARNING:
                throw new \Sge\Exception\WarningException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_PARSE:
                throw new \Sge\Exception\ParseException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_NOTICE:
                throw new \Sge\Exception\NoticeException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_CORE_ERROR:
                throw new \Sge\Exception\CoreErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_CORE_WARNING:
                throw new \Sge\Exception\CoreWarningException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_COMPILE_ERROR:
                throw new \Sge\Exception\CompileErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_COMPILE_WARNING:
                throw new \Sge\Exception\CoreWarningException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_USER_ERROR:
                throw new \Sge\Exception\UserErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_USER_WARNING:
                throw new \Sge\Exception\UserWarningException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_USER_NOTICE:
                throw new \Sge\Exception\UserNoticeException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_STRICT:
                throw new \Sge\Exception\StrictException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_RECOVERABLE_ERROR:
                throw new \Sge\Exception\RecoverableErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_DEPRECATED:
                throw new \Sge\Exception\DeprecatedException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_USER_DEPRECATED:
                throw new \Sge\Exception\UserDeprecatedException($err_msg, 0, $error_handler, $err_file, $err_line);
        }

        return true;
    }
}
