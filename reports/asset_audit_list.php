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
 	
	require('../includes/prepend.inc.php');		/* if you DO NOT have "includes/" in your include_path */
	QApplication::Authenticate(7);
	require_once(__FORMBASE_CLASSES__ . '/AuditListFormBase.class.php');
	
	class AssetAuditListForm extends AuditListFormBase {
		
		// Header Menu
		protected $ctlHeaderMenu;
		
		// Shortcut Menu
		protected $ctlShortcutMenu;
		
		// Audit Array
		protected $objAuditArray;
		
		protected function Form_Create() {
			// Create the Header Menu
			$this->ctlHeaderMenu_Create();
			$this->ctlShortcutMenu_Create();
			//QApplication::$Database[1]->EnableProfiling();
			if ($_GET && $_GET['method'] == 'delete') {
        $objAudit = Audit::Load($_GET['intAuditId']);
        if ($objAudit) {
        	// Set the relationship to ON DELETE CASCADE so that the AuditScans will be automatically deleted when deleting the Audit Object
          $objAudit->Delete();
          QApplication::Redirect("./asset_audit_list.php");
        }
      }
	    // Load an array of Audit objects using join on UserAccount.
			$this->objAuditArray = Audit::LoadAll(QQ::Clause(QQ::Expand(QQN::Audit()->CreatedByObject)));
		}
		
		// Create and Setup the Header Composite Control
		protected function ctlHeaderMenu_Create() {
			$this->ctlHeaderMenu = new QHeaderMenu($this);
		}
		
		// Create and Setp the Shortcut Menu Composite Control
  	protected function ctlShortcutMenu_Create() {
  		$this->ctlShortcutMenu = new QShortcutMenu($this);
  	}
  	  	
  	
	}
	
	// Go ahead and run this form object to generate the page
	AssetAuditListForm::Run('AssetAuditListForm', 'asset_audit_list.tpl.php');
	//QApplication::$Database[1]->OutputProfiling();
	  	
?>