// This function hides the toggle menu if it is being displayed
function clickWindow(toggleMenuId) {
	var objToggleMenu = document.getElementById(toggleMenuId);
	if (objToggleMenu.parentNode.style.display != 'none') {
		qc.getW(toggleMenuId).toggleDisplay('hide');
	}
}

// This function repositions the toggle menu when the window is resized
function resizeWindow(toggleMenuId, toggleButtonId) {
	var objToggleMenu = document.getElementById(toggleMenuId);
	if (objToggleMenu.parentNode.style.display != 'none') {
		setPosition(toggleButtonId, toggleMenuId);
	}
}

// This function is run when the ColumnToggleButton is clicked
// Positions and Displays the column toggle menu
function toggleColumnToggleDisplay(e, toggleMenuId, toggleButtonId, strParent) {
	
	// Set the position of the toggle menu based on the location of the menu button
	setPosition(toggleButtonId, toggleMenuId, strParent);
	
	// Display/Hide the column toggle menu
	qc.getW(toggleMenuId).toggleDisplay();
	
	var objToggleMenu = document.getElementById(toggleMenuId);
	// Set the onresize and onclick event handlers only when the menu is being displayed to avoid unnecessarily running the function
	if (objToggleMenu.parentNode.style.display != 'none') {
		function r() {
			resizeWindow(toggleMenuId, toggleButtonId);
		}
		window.onresize = r;
		
		function c() {
			clickWindow(toggleMenuId);
		}
		window.document.onclick = c;
	}
	// Set event handlers to null when menu is not being displayed
	else {
		window.onresize = null;
		window.document.onclick = null;
	}
	
	// Stop bubbling up and propagation down in events so that functions don't get run more than once
	// This was specifically because setPosition was getting run from the window.onClick() event and from clicking on the button
	if (!e) { var e = window.event; }
  	e.cancelBubble = true;
  	if (e.stopPropagation) { e.stopPropagation(); }
}

// Based on the position of the button (strLabelControlId), this positions the column toggle menu (strPanelControlId)
function setPosition(strLabelControlId, strPanelControlId, strParent) {

	 var objLabel = document.getElementById(strLabelControlId);
	 var arrCurrentLabelPosition = findPosition(objLabel.offsetParent);
	 // If the parent of the parent of the datagrid is a QDialogBox then we need to account for that QDialogBox's positioning
	 // Otherwise it would position itself relative to the edge of the dialog, not the screen
	 if (strParent == 'QDialogBox') {
	 	var arrCurrentDialogPosition = findPosition(objLabel.offsetParent.offsetParent.offsetParent);
	 }
	 //alert("arrCurrentDialogPosition[0]: " + arrCurrentDialogPosition[0] + " arrCurrentDialogPosition[1]: " + arrCurrentDialogPosition[1]);
	 
	 
	 var objToggleMenu = document.getElementById(strPanelControlId);
	 var strMenuWidth = objToggleMenu.offsetWidth;
	 // The menu width will be 0 when it is first rendered as display: none. This uses it's style parameters to calculate what it's width will be
	 // This was necessary in order to be able to set the position of the menu before it was displayed, to avoid a scrollbar flicker.
	 if (strMenuWidth==0) {
	 	strMenuWidth = getWidth(objToggleMenu);
	 }
	 objToggleMenu.style.position = 'absolute';
	 // If this is a modal dialog then we will account for that dialog's position on the screen here
	 if (strParent == 'QDialogBox') {
	 	 objToggleMenu.style.left = (arrCurrentLabelPosition[0] + objLabel.offsetParent.offsetWidth - strMenuWidth - arrCurrentDialogPosition[0]) + 'px';
	 	 objToggleMenu.style.top = (arrCurrentLabelPosition[1] + objLabel.offsetParent.offsetHeight - arrCurrentDialogPosition[1]) + 'px';
	 }
	 // If the parent is a QControl like a QForm and just exists on the page normally
	 else {
		 objToggleMenu.style.left = (arrCurrentLabelPosition[0] + objLabel.offsetParent.offsetWidth - strMenuWidth) + 'px';
		 objToggleMenu.style.top = (arrCurrentLabelPosition[1] + objLabel.offsetParent.offsetHeight) + 'px';
	 }
	 //alert("arrCurrentLabelPosition[0]: " + arrCurrentLabelPosition[0] + " arrCurrentLabelPosition[1]: " + arrCurrentLabelPosition[1] + " offsetWidth: " + objLabel.offsetParent.offsetWidth + " strMenuWidth: " + strMenuWidth + " offsetHeight: " + objLabel.offsetParent.offsetHeight + " style.left: " + objToggleMenu.style.left + " style.top " + objToggleMenu.style.top);

}

// This function finds the absolute position of and element in pixels by drilling down through all parent elements and summing all left and top offsets.
function findPosition(obj) {
	var current_top = 0;
	var current_left = 0;
	if (obj.offsetParent) {
		current_left = obj.offsetLeft;
		current_top = obj.offsetTop;
		while (obj = obj.offsetParent) {
			current_left += obj.offsetLeft;
			current_top += obj.offsetTop;
		}
	}
	return [current_left,current_top];
}

function getWidth(obj) {

	var strWidth = 0;
	
	var intWidth = parseInt(obj.style.width);
	var intPaddingLeft = parseInt(obj.style.paddingLeft);
	var intPaddingRight = parseInt(obj.style.paddingRight);
	var intBorderLeftWidth = parseInt(obj.style.borderLeftWidth);
	var intBorderRightWidth = parseInt(obj.style.borderRightWidth);
	strWidth += (!isNaN(intWidth)) ? intWidth : 0;
	strWidth += (!isNaN(intPaddingLeft)) ? intPaddingLeft : 0;
	strWidth += (!isNaN(intPaddingRight)) ? intPaddingRight : 0;
	strWidth += (!isNaN(intBorderLeftWidth)) ? intBorderLeftWidth : 0;
	strWidth += (!isNaN(intBorderRightWidth)) ? intBorderRightWidth : 0;
	
	return strWidth;
}




