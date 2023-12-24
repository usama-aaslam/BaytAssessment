<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;

class BaseTestCase
{
    protected $driver;
    
    protected function setUp(): void
    {
        $host = 'http://localhost:4444/wd/hub'; // Selenium Server
        $capabilities = ['platform' => 'ANY', 'browserName' => 'chrome'];
        $this->driver = RemoteWebDriver::create($host, $capabilities);
    }
    
    protected function tearDown(): void
    {
        $this->driver->quit();
    }
    
    // Add any common helper methods or assertions here
}
