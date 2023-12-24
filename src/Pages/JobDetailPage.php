<?php
// JobDetailsPage.php
namespace Pages;

use Facebook\WebDriver\Remote\RemoteWebDriver;

class JobDetailsPage
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
    
    public function applyForJob()
    {
        $applyButton = $this->driver->findElement(WebDriverBy::xpath('//*[text()="Apply Now"]'));
        $applyButton->click();
        $createNewAccount = $this->driver->findElement(WebDriverBy::xpath('//*[text()="Create a new account"]'));
        return new RegistrationPage($this->driver);
    }
}

?>