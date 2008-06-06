var arrayAssetCode = new Array();
var i=0;
function AddAsset() {
    strAssetCode = document.getElementById('asset_code').value;
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
    var strAssetCode = arrayAssetCode.join("#");
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
         document.main_form.submit();
    }
}
function CompleteCheckOut() {
    var strAssetCode = "";
    var strAssetCode = arrayAssetCode.join("#");
    if (arrayAssetCode.length == 0) {
        document.getElementById('warning').innerHTML = "You must provide at least one asset";
        return false;
    }
    if (arrayAssetCode.length>0) {
         document.main_form.result.value = strAssetCode;
         document.main_form.submit();
    }
}