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
function toggleColumnToggleDisplay(e, toggleMenuId, toggleButtonId) {
	
	// Display/Hide the column toggle menu
	qc.getW(toggleMenuId).toggleDisplay();
	var objToggleMenu = document.getElementById(toggleMenuId);
	// Set the onresize and onclick event handlers only when the menu is being displayed to avoid unnecessarily running the function
	if (objToggleMenu.parentNode.style.display != 'none') {
		window.onresize = function() {resizeWindow(toggleMenuId, toggleButtonId);}
		window.document.onclick = function () {clickWindow(toggleMenuId);}
	}
	// Set event handlers to null when menu is not being displayed
	else {
		window.onresize = null;
		window.document.onclick = null;
	}
	
	// Set the position of the toggle menu based on the location of the menu button
	setPosition(toggleButtonId, toggleMenuId);
	
	// Stop bubbling up and propagation down in events so that functions don't get run more than once
	// This was specifically because setPosition was getting run from the window.onClick() event and from clicking on the button
	if (!e) var e = window.event;
  e.cancelBubble = true;
  if (e.stopPropagation) e.stopPropagation();
}

// Based on the position of the button (strLabelControlId), this positions the column toggle menu (strPanelControlId)
function setPosition(strLabelControlId, strPanelControlId) {
	
	 var objLabel = document.getElementById(strLabelControlId);
	 var arrCurrentLabelPosition = findPosition(objLabel.offsetParent);
	 
	 var objToggleMenu = document.getElementById(strPanelControlId);
	 objToggleMenu.style.position = 'absolute';
	 objToggleMenu.style.left = (arrCurrentLabelPosition[0] + objLabel.offsetParent.offsetWidth - objToggleMenu.offsetWidth) + 'px';
	 objToggleMenu.style.top = (arrCurrentLabelPosition[1] + objLabel.offsetParent.offsetHeight) + 'px';
}

// This function finds the absolute position of and element in pixels by drilling down through all parent elements and summing all left and top offsets.
function findPosition(obj) {
	var current_top = 0;
	var current_left = 0;
	if (obj.offsetParent) {
		current_left = obj.offsetLeft
		current_top = obj.offsetTop
		while (obj = obj.offsetParent) {
			current_left += obj.offsetLeft
			current_top += obj.offsetTop
		}
	}
	return [current_left,current_top];
}





