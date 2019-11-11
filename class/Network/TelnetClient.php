<?php
namespace Network;

class TelnetClient
{

    private $_host;
    private $_port;
    private $_socket;
    private $_log;

    public function getLog()
    {
        return $this->_log;
    }

    public function __construct($host, $port)
    {
        $this->_host = $host;
        $this->_port = $port;
        $this->_log = "";
    }

    public function __destruct()
    {
        $this->disconnect();
    }

    public function connect($timeout = 3)
    {
        $this->_socket = @fsockopen($this->_host, $this->_port, $errno, $errstr, $timeout);
        if ($this->_socket === false) {
            $this->_log .= $errno . " " . $errstr . "\n";
            throw new \Exception($errstr, $errno);
        }
    }

    public function disconnect()
    {
        if ($this->_socket !== false) {
            fclose($this->_socket);
            $this->_socket = false;
        }
    }

    public function read($usleep = 200000)
    {
        $contents = iconv("UTF-8", "UTF-8//IGNORE", fread($this->_socket, 8192));
        $this->_log .= $contents;
        usleep($usleep);
        return $contents;
    }

    public function write($command, $usleep = 200000)
    {
        fputs($this->_socket, $command . "\n");
        $this->_log .= $command . "\n";
        usleep($usleep);
    }

    public function exec($command, $usleep = 200000)
    {
        $this->write($command, $usleep);
        $this->read($usleep);
    }

    public function telnetLogin($user, $password, $finalPrompt = "#", $userPrompt = "Username: ", $passPrompt = "Password: ")
    {
        if ($this->_socket === false) {
            throw new \Exception("Non initialized socket.", -2);
        }

        $prompt = $this->read(400000);

        if (substr($prompt, -strlen($userPrompt)) !== $userPrompt) {
            $prompt = $this->read(400000);
        }

        if (substr($prompt, -strlen($userPrompt)) === $userPrompt) {
            $this->write($user);
            $prompt = $this->read();
            if (substr($prompt, -strlen($passPrompt)) === $passPrompt) {
                $this->write($password);
                $prompt = $this->read();
                if (substr($prompt, -strlen($finalPrompt)) !== $finalPrompt) {
                    throw new \Exception("Unexpected command prompt. Check login credentials.", -3);
                }
            } else {
                throw new \Exception("Unexpected password prompt.", -2);
            }
        } else {
            throw new \Exception("Unexpected user prompt.", -1);
        }
    }
}
