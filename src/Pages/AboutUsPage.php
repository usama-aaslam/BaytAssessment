
    <?php
    // AboutUsPage.php
    namespace Pages;
    
    use Facebook\WebDriver\Remote\RemoteWebDriver;
    
    class AboutUsPage
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
    }
    
	?>
 