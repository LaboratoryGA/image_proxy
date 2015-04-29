<?php

/*
 * Copyright (C) 2015 Nathan Crause <nathan at crause.name>
 *
 * This file is part of Image_Proxy
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace Claromentis\Image_proxy;

use TemplaterComponentTmpl;

/**
 * Generates a &lt;figure&gt; tag for an image
 *
 * @author Nathan Crause <nathan at crause.name>
 */
final class Component extends TemplaterComponentTmpl {
	
	const OPT_TEMPLATE = 'template';
	
	const OPT_SRC = 'src';
	
	const OPT_CSS_CLASS = 'css_class';
	
	private static $DEFAULTS = [
		self::OPT_TEMPLATE	=> 'image_proxy/figure.html',
		self::OPT_SRC		=> 'http://placehold.it/350x150'
	];
	
	public function Show($attributes) {
		$options = array_merge(self::$DEFAULTS, $attributes);
		
		$args = [
			'proxy.style'	=> 'background-image: url("' 
					. htmlentities($options[self::OPT_SRC]) . '");'
		];
		
		if (key_exists(self::OPT_CSS_CLASS, $options)) {
			$args['proxy.+class'] = $options[self::OPT_CSS_CLASS];
		}
		
		return $this->CallTemplater($options[self::OPT_TEMPLATE], $args);
	}

}
