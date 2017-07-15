<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/11/23
 * Time: 15:12
 */

namespace Bower\Traits;

trait Mail
{
    protected function mailSend(array $sendTo, array $sendCC = [], $subject = '', $content = '', $isHtml = true)
    {
        list($mailHost, $mailPort, $mailFrom, $mailUser, $mailPass, $mailTimeout) = config('Mail');
        $mail = "MIME-Version:1.0\r\n";
        $isHtml and $mail .= "Content-Type:text/html\r\n";
        $toMail = implode(',', (array)$sendTo);
        $mail .= "To: $toMail\r\n";
        if ($sendCC) {
            $ccMail = implode(',', (array)$sendCC);
            $mail .= "Cc: $ccMail\r\n";
        }
        $mail .= "From: {$mailFrom}\r\n";

        $mail .= "Subject:$subject\r\n";
        $mail .= "Date: " . date("r") . "\r\n";
        $mail .= "X-Mailer:By Bower Mail 1.0\r\n\r\n";
        $mail .= $content . "\r\n.\r\n";

        $toArray = array_merge((array)$sendTo, (array)$sendCC);
        foreach ($toArray as $toItem) {
            $sock = fsockopen($mailHost, $mailPort, $errno, $errstr, $mailTimeout);
            if (!$sock) {
                throw new \Exception(sprintf('smtp_error:(%s)%s', $errno, $errstr));
            }
            $code = substr(fread($sock, 512), 0, 3);
            if ($code != '220') {
                throw new \Exception("can not connect to server {$mailHost}:{$mailPort}");
            }
            $command = array(
                array("HELO sendmail\r\n", 250),
                array("AUTH LOGIN\r\n", 334),
                array(base64_encode($mailUser) . "\r\n", 334),
                array(base64_encode($mailPass) . "\r\n", 235),
                array("MAIL FROM:<{$mailFrom}>\r\n", 250),
                array("RCPT TO:<$toItem>\r\n", 250),
                array("DATA\r\n", 354),
                array($mail, 250),
                array("QUIT\r\n", 221)
            );
            foreach ($command as list($cmd, $repCode)) {
                fwrite($sock, $cmd);
                $msg = fread($sock, 512);
                $code = substr($msg, 0, 3);
                if ($code != $repCode) {
                    throw new \Exception(sprintf('smtp_error:(%s)%s', $cmd, $msg));
                }
            }
            fclose($sock);
        }
        return true;
    }
}