<?php
/**
 * This is a library for all the DataTable cell renderers. This probably should be done in a better way at some point.
 * 
 * PHP Version: 5.3
 * 
 * @category Library
 * @package  My-Community
 * @author   ivebeenlinuxed <will@bcslichfield.com>
 * @license  All Rights Reserved
 * @version  GIT: $Id$
 * @link     http://www.bcslichfield.com/
 * 
 */

namespace Library;

class CellRenderer {
	public static function iCalFrequency($data, $col) {
		return \Library\ICal::parseFrequency($data);
	}
	
	public static function EventDescription($data, $col) {
		return '<a href="/event/'.$data->id.'">'.(($data->title == "") ? substr($data->description, 0, 50).'</a>...' : $data->title).'</a>';
	}
	
	/**
	 * Render a hidden field
	 * 
	 * @param \Model\DBObject $data The database object
	 * @param string          $col  The column to be added
	 * 
	 * @return string
	 */
	public static function HiddenField($data, $col) {
		return "<input type='hidden' name='".$data->getUniqueIdentifier()."_{$col}' value='{$data->$col}' />";
	}
}