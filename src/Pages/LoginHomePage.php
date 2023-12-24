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
        // Click on the  menu on the Navigation Bar
        $this->driver->findElement(WebDriverBy::xpath('//*[@class="inline-b"]'))->click();
        
        // Select Account Settings
        $this->driver->findElement(WebDriverBy::xpath('//*[@class="inline-b"]/a[text()="Account Settings"]'))->click();
        
        //  steps to complete the deletion flow
         $this->driver->executeScript('window.scrollTo(0, document.body.scrollHeight);');
         $this->driver->findElement(WebDriverBy::xpath('(//*[text() = 'Delete My Account'])[2]"]'))->click();
         
         $this->driver->findElement(WebDriverBy::xpath('(//*[text() = 'Delete My Account'])[2]"]'))->click();
         
         $this->driver->findElement(WebDriverBy::xpath('//button[@type="submit" and text() = 'Yes, Delete My Account']')->click();
         
         $expectedUrl = 'https://careers.bayt.com/en/delete-account-confirmation/';
         
         // The actual URL 
         $actualUrl = $_SERVER['REQUEST_URI']; 
         
         // Assert that the actual URL is equal to the expected URL
         assert($actualUrl === $expectedUrl);
         
         
         // assert($actualUrl === $expectedUrl, 'URL does not match expected value');
         
         echo 'Account deleted successfully!'; // This will be printed if the assertion passes
        return new RegistrationPage($this->driver);
    }
}


?>