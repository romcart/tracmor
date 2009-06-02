<?php
/*
 * Copyright (c)  2009, Tracmor, LLC 
 *
 * This file is part of Tracmor.  
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 *	
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php
	class QExtendedOptimisticLockingException extends QOptimisticLockingException  {
		
		protected $intEntityId;
		
		public function __construct($strClass, $intEntityId = null) {
			$this->strClass = $strClass;
			$this->intEntityId = $intEntityId;
			parent::__construct($strClass);
		}
		
		public function __get($strName) {
			switch ($strName) {
				case 'Class':
					/**
					 * Gets the value for strClass (Read-Only value)
					 */
					return $this->strClass;
					break;
				case 'EntityId':
					/**
					 * Gets the value for intEntityId (Read-Only PK)
					 * @return integer
					 */
					return $this->intEntityId;
					break;
			}
		}
	}
?>