<?php
// BaytHomePage.php
namespace Pages;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class BaytHomePage
{
    private $driver;
    
    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }
    
    public function open()
    {
        $this->driver->get('https://www.bayt.com');
        return $this;
    }
    
    public function scrollToFooter()
    {
        $this->driver->executeScript('window.scrollTo(0, document.body.scrollHeight);');
        return $this;
    }
    
    public function clickAboutUsLink()
    {
        $aboutUsLink = $this->driver->findElement(WebDriverBy::linkText('About Us'));
        $aboutUsLink->click();
        return new AboutUsPage($this->driver);
    }
    
    public function clickJobLink()
    {
        $aboutUsLink = $this->driver->findElement(WebDriverBy::linkText('Career'));
        $aboutUsLink->click();
        return new CareerPage($this->driver);
        $jobLink = $this->driver->findElement(WebDriverBy::xpath('(//*[@class="btn view-jb-btn capitalize"])[1]'));
        $jobLink->click();
        return new JobDetailsPage($this->driver);
    }
}
?>