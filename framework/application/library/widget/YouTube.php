<?php 
namespace Library\Widget;

class YouTube extends PageWidget {
	public $url;
	
	public function __construct($url) {
		$this->url = $url;
	}
	
	public function Render() {
		?>
			<div class="widget-container" id="group_youtube_widget">
				<h3 class="widget-title">YouTube Channel</h3>
				<?php 
				?>
				<div>
				<?php
				if (!$this->isEditMode()) {
				
					if ($this->url == "") {
						echo "This group does not have a YouTube channel";
					} else {
						$xml = new \SimpleXMLElement(file_get_contents($this->url));
						$it = $xml->xpath("//item");
						$num = 5;
						for ($k=0; $k<(count($it)<$num? count($it) : 3); $k++) {
							$item = $it[$k];
							$d = \System\Library\StdLib::decode_entities($item->description);
							$i = new \Library\Xml\simple_html_dom($d);
							$d = $i->outertext;
							foreach ($i->find("//td[@width=146]") as $j) {
								$d = str_replace((string)$j->outertext, "", $d);
							}
							
							foreach ($i->find("//td[@style]") as $j) {
								$d = str_replace((string)$j->outertext, "", $d);
							}
							
							$d = str_replace("<a", "<a data-youtube", $d);
							//echo $item->description;
							echo $d;
						}
					}
				} else {
					?>
					<label for="youtube_off" class="radio"><input type="radio" value="OFF" name="youtube" id="youtube_off"<?php if ($this->url == "") {echo "checked ";} ?> />Disable YouTube</label><br />
					<label for="youtube_on" class="radio"><input type="radio" value="ON" name="youtube" id="youtube_on"<?php if ($this->url != "") {echo "checked ";} ?> /><input type="text" name="youtube_feed" value="<?php echo $this->url ?>" placeholder="YouTube RSS Feed" /></label><br />
					
					<?php
				}
				?>
				</div>
			</div>
		<?php
	}
}
?>