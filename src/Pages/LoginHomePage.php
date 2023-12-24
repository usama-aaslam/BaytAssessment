<?php
// LoginHomePage.php
// HomePage.php
namespace Pages;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class HomePage
{
    private $driver;
    
    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }
    
    public function takeScreenshot($filename)
    {
        $this->driver->takeScreenshot($filename);
        return $this;
    }
    
    public function deleteAccount()
    {
        // Click on the three dots menu on the Navigation Bar
        $this->driver->findElement(WebDriverBy::id('menuTrigger'))->click();
        
        // Select Account Settings
        $this->driver->findElement(WebDriverBy::xpath('//div[@class="dropdown-menu"]/a[text()="Account Settings"]'))->click();
        
        // Additional steps to complete the deletion flow
        // ...
        
        return new RegistrationPage($this->driver);
    }
}


?>