<?php
namespace Sge\Service;

class Sge
{
    /**
     *
     * @return mixed
     */
    public function init()
    {
        return set_error_handler(array($this,'error_handler'));
    }

    public function error_handler($error_handler, $err_msg, $err_file, $err_line, array $err_context)
    {
        if (0 === error_reporting()) {
            return false;
        }
        switch ($error_handler) {
            case E_ERROR:
                throw new ErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_WARNING:
                throw new WarningException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_PARSE:
                throw new ParseException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_NOTICE:
                throw new NoticeException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_CORE_ERROR:
                throw new CoreErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_CORE_WARNING:
                throw new CoreWarningException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_COMPILE_ERROR:
                throw new CompileErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_COMPILE_WARNING:
                throw new CoreWarningException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_USER_ERROR:
                throw new UserErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_USER_WARNING:
                throw new UserWarningException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_USER_NOTICE:
                throw new UserNoticeException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_STRICT:
                throw new StrictException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_RECOVERABLE_ERROR:
                throw new RecoverableErrorException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_DEPRECATED:
                throw new DeprecatedException($err_msg, 0, $error_handler, $err_file, $err_line);
            case E_USER_DEPRECATED:
                throw new UserDeprecatedException($err_msg, 0, $error_handler, $err_file, $err_line);
        }
        
        return true;
    }
}
