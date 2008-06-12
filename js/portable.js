var arrayAssetCode = new Array();
var i=0;
function AddAsset() {
    var strAssetCode = document.getElementById('asset_code').value;
    if (strAssetCode != '') {
        document.getElementById('warning').innerHTML = "";
        arrayAssetCode[i] = strAssetCode;
        document.getElementById('result').innerHTML += arrayAssetCode[i++] + "<br/>";
        document.getElementById('asset_code').value = '';
    }
    else {
        document.getElementById('warning').innerHTML = "Asset Code cannot be empty";
    }
    document.getElementById('asset_code').focus();
}
function AddAssetPost(strAssetCode) {
    arrayAssetCode[i] = strAssetCode;
    document.getElementById('result').innerHTML += arrayAssetCode[i++] + "<br/>";
}
function CompleteMove() {
    var strAssetCode = "";
    strAssetCode = arrayAssetCode.join("#");
    if (arrayAssetCode.length == 0) {
        document.getElementById('warning').innerHTML = "You must provide at least one asset";
        return false;
    }
    if (document.main_form.destination_location.value == "") {
        document.getElementById('warning').innerHTML = "Destination Location cannot be empty";
        return false;
    }
    if (arrayAssetCode.length>0 && document.main_form.destination_location.value != "") {
         document.main_form.result.value = strAssetCode;
         return true;
    }
    return false;
}
function CompleteCheckOut() {
    var strAssetCode = "";
    strAssetCode = arrayAssetCode.join("#");
    if (arrayAssetCode.length == 0) {
        document.getElementById('warning').innerHTML = "You must provide at least one asset";
        return false;
    }
    if (arrayAssetCode.length>0) {
         document.main_form.result.value = strAssetCode;
         return true;
    }
    return false;
}
function CheckIdPin() {
    if (document.main_form.user_account_id.value != "" && document.main_form.portable_user_pin.value != "") return true;
    else {
        if (document.main_form.user_account_id.value == "") document.main_form.user_account_id.focus();
        else document.main_form.portable_user_pin.focus();
        return false;
    }
}
function AddAssetLocation() {
    var strAssetCode = document.getElementById('asset_code').value;
    var strLocation = document.getElementById('destination_location').value
    if (strAssetCode != '' && strLocation != '') {
        document.getElementById('warning').innerHTML = "";
        arrayAssetCode[i++] = strAssetCode + "|" + strLocation;
        document.getElementById('result').innerHTML += "Asset Code: " + strAssetCode + " Location: " + strLocation + "<br/>";
        document.getElementById('asset_code').value = '';
        document.getElementById('destination_location').value = '';
        document.getElementById('asset_code').focus();
    }
    else {
        if (strAssetCode == '') {
            document.getElementById('warning').innerHTML = "Asset Code cannot be empty";
            document.getElementById('asset_code').focus();
        }
        else {
            document.getElementById('warning').innerHTML = "Destination Location cannot be empty";
            document.getElementById('destination_location').focus();
        }
    }
}
function AddAssetLocationPost(strAssetCode,strLocation) {
    if (strAssetCode != '' && strLocation != '') {
        arrayAssetCode[i++] = strAssetCode + "|" + strLocation;
        document.getElementById('result').innerHTML += "Asset Code: " + strAssetCode + " Location: " + strLocation + "<br/>";
        document.getElementById('asset_code').value = '';
        document.getElementById('destination_location').value = '';
        document.getElementById('asset_code').focus();
    }
}
function CompleteReceipt() {
    var strAssetCode = "";
    strAssetCode = arrayAssetCode.join("#");
    if (arrayAssetCode.length == 0) {
        document.getElementById('warning').innerHTML = "You must provide at least one asset";
        return false;
    }
    if (arrayAssetCode.length>0) {
         document.main_form.result.value = strAssetCode;
         return true;
    }
    return false;
}