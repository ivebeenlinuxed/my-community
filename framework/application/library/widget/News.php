<?php 
namespace Library\Widget;

class News extends PageWidget {
	public $url;
	
	/**
	 * 
	 * @param array  $articles
	 * @param string $rss
	 */
	public function __construct($articles, $rss) {
		$this->articles = $articles;
		$this->rss = $rss;
	}
	
	/**
	 * (non-PHPdoc)
	 * 
	 * @see Library\Widget.PageWidget::Render()
	 * @todo Move this to a view
	 * 
	 * @return null
	 */
	public function Render() {



		?>
<div class="widget-container" id="group_news_widget">
	<h3 class="widget-title">News</h3>
	<?php
	if (!$this->isEditMode()) {
			

		if (count($this->articles) == 0 && $this->rss == "") {
			echo "<div class='wgt-msg'>No automated news source added</div>";
		} else if (count($this->articles) == 0) {
			echo "<div class='wgt-msg'>There was no news on the Feed provided</div>";
		}
		?>
	<ul class="thumblist">
		<?php
		for ($i=0; $i<(count($this->articles)<2? count($this->articles) : 2); $i++) {
			$news = $this->articles[$i];
			?>
		<li>
			<h4>
				<?php echo $news->title ?>
			</h4> <span><?php echo $news->text ?> </span> <a class="read"
			href="<?php echo $news->link ?>">Read More &#187;</a>
		</li>
		<?php
		}
		?>
	</ul>
	<?php
	if (count($this->articles) > 2) {
		?>
	<div class='bcs_wsh'>More News</div>
	<ul class="extralist">
		<?php
		for ($i=2; $i<(count($this->articles)<6? count($this->articles) : 6); $i++) {
			$news = $this->articles[$i];
			?>
		<li><a href="<?php echo $news->link ?>"><?php echo $news->title ?>
		</a>
		</li>
		<?php
		}
	}
	?>
	</ul>
</div>
<?php 
	} else {
		?>
<label for="rss_off" class="radio"><input type="radio" value="OFF"
	name="rss" id="rss_off"
	<?php if ($this->rss == "") {echo "checked ";} ?> />Disable RSS</label>
<br />
<label for="rss_on" class="radio"><input type="radio" value="ON"
	name="rss" id="rss_on"
	<?php if ($this->rss != "") {echo "checked ";} ?> /><input type="text"
	name="rss_feed" value="<?php echo $this->rss ?>" placeholder="RSS Feed" />
</label>
<br />

<?php
	}
	?>
</div>
<?php 
	}
}
?>