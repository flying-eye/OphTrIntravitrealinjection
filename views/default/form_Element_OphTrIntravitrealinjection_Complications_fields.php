<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<?php 
	$html_options = array(
		'options' => array(),	
		'empty' => '- Please select -',
		'div_id' =>  get_class($element) . '_' . $side . '_complications',
		'label' => 'Complications');
	$complications = OphTrIntravitrealinjection_Complication::model()->findAll(array('order'=>'display_order asc'));
	foreach ($complications as $complication) {
		$html_options['options'][(string)$complication->id] = array('data-order' => $complication->display_order, 'data-description_required' => $complication->description_required); 
	}
	echo $form->multiSelectList($element, get_class($element) . '[' . $side . '_complications]', $side . '_complications', 'id', CHtml::listData($complications,'id','name'), $element->ophtrintravitinjection_complication_defaults, $html_options)
?>
<?php echo $form->textArea($element, $side . '_oth_descrip', array('rows' => 4, 'cols' => 30))?>