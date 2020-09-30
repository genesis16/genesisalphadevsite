<?php
namespace MomentsQodef\Modules\Shortcodes\Lib;

use MomentsQodef\Modules\CoverBoxes\CoverBoxes;
use MomentsQodef\Modules\Shortcodes\Accordion\Accordion;
use MomentsQodef\Modules\Shortcodes\AccordionTab\AccordionTab;
use MomentsQodef\Modules\Shortcodes\Blockquote\Blockquote;
use MomentsQodef\Modules\Shortcodes\BlogList\BlogList;
use MomentsQodef\Modules\Shortcodes\Button\Button;
use MomentsQodef\Modules\Shortcodes\CallToAction\CallToAction;
use MomentsQodef\Modules\Shortcodes\Counter\Countdown;
use MomentsQodef\Modules\Shortcodes\Counter\Counter;
use MomentsQodef\Modules\Shortcodes\CustomFont\CustomFont;
use MomentsQodef\Modules\Shortcodes\Dropcaps\Dropcaps;
use MomentsQodef\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use MomentsQodef\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use MomentsQodef\Modules\Shortcodes\GoogleMap\GoogleMap;
use MomentsQodef\Modules\Shortcodes\Highlight\Highlight;
use MomentsQodef\Modules\Shortcodes\Icon\Icon;
use MomentsQodef\Modules\Shortcodes\IconListItem\IconListItem;
use MomentsQodef\Modules\Shortcodes\IconWithText\IconWithText;
use MomentsQodef\Modules\Shortcodes\ImageGallery\ImageGallery;
use MomentsQodef\Modules\Shortcodes\InfoBox\InfoBox;
use MomentsQodef\Modules\Shortcodes\Message\Message;
use MomentsQodef\Modules\Shortcodes\OrderedList\OrderedList;
use MomentsQodef\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use MomentsQodef\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use MomentsQodef\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use MomentsQodef\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use MomentsQodef\Modules\Shortcodes\PricingTables\PricingTables;
use MomentsQodef\Modules\Shortcodes\PricingTable\PricingTable;
use MomentsQodef\Modules\Shortcodes\ProgressBar\ProgressBar;
use MomentsQodef\Modules\Shortcodes\Separator\Separator;
use MomentsQodef\Modules\Shortcodes\ServiceTable\ServiceTable;
use MomentsQodef\Modules\Shortcodes\ServiceTables\ServiceTables;
use MomentsQodef\Modules\Shortcodes\SocialShare\SocialShare;
use MomentsQodef\Modules\Shortcodes\Tabs\Tabs;
use MomentsQodef\Modules\Shortcodes\Tab\Tab;
use MomentsQodef\Modules\Shortcodes\Team\Team;
use MomentsQodef\Modules\Shortcodes\UnorderedList\UnorderedList;
use MomentsQodef\Modules\Shortcodes\VideoButton\VideoButton;
use MomentsQodef\Modules\Shortcodes\ImageSlider\ImageSlider;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new BlogList());
        $this->addShortcode(new Button());
        $this->addShortcode(new CallToAction());
        $this->addShortcode(new Counter());
        $this->addShortcode(new Countdown());
        $this->addShortcode(new CoverBoxes());
        $this->addShortcode(new CustomFont());
        $this->addShortcode(new Dropcaps());
        $this->addShortcode(new ElementsHolder());
        $this->addShortcode(new ElementsHolderItem());
        $this->addShortcode(new GoogleMap());
        $this->addShortcode(new Highlight());
        $this->addShortcode(new Icon());
        $this->addShortcode(new IconListItem());
        $this->addShortcode(new IconWithText());
        $this->addShortcode(new ImageGallery());
        $this->addShortcode(new InfoBox());
        $this->addShortcode(new Message());
        $this->addShortcode(new OrderedList());
        $this->addShortcode(new PieChartBasic());
        $this->addShortcode(new PieChartPie());
        $this->addShortcode(new PieChartDoughnut());
        $this->addShortcode(new PieChartWithIcon());
        $this->addShortcode(new PricingTables());
        $this->addShortcode(new PricingTable());
        $this->addShortcode(new ProgressBar());
        $this->addShortcode(new Separator());
        $this->addShortcode(new ServiceTables());
        $this->addShortcode(new ServiceTable());
        $this->addShortcode(new SocialShare());
        $this->addShortcode(new Tabs());
        $this->addShortcode(new Tab());
        $this->addShortcode(new Team());
        $this->addShortcode(new UnorderedList());
        $this->addShortcode(new VideoButton());
		$this->addShortcode(new ImageSlider());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();