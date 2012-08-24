<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');

// If the page class is defined, add to class as suffix.
// It will be a separate class if the user starts it with a space
?>
<section class="blog-featured<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading') != 0) : ?>

<h1 class="page-header">
<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>

<?php endif; ?>

<?php if (!empty($this->lead_items)) : ?>
<section class="items-leading clearfix">
	<?php foreach ($this->lead_items as &$item) : ?>
		<?php
			$this->item = &$item;
			echo $this->loadTemplate('item');
		?>
	<?php endforeach; ?>
</section>
<?php endif; ?>
<?php
	$introcount = (count($this->intro_items));
	$counter = 0;
?>
<?php if (!empty($this->intro_items)) : ?>
<section class="items-intro">
	<?php foreach ($this->intro_items as $key => &$item) : ?>
		<?php
		$key = ($key - $leadingcount) + 1;
			<?php
					$this->item = &$item;
					echo $this->loadTemplate('item');
			?>
	<?php endforeach; ?>
</section>
<?php endif; ?>

<?php if (!empty($this->link_items)) : ?>
	<nav class="items-more">
	<?php echo $this->loadTemplate('links'); ?>
	</nav>
<?php endif; ?>

<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
	<nav class="pagination">

		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter pull-right">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		<?php  endif; ?>
				<?php echo $this->pagination->getPagesLinks(); ?>
	</nav>
<?php endif; ?>

</section>
