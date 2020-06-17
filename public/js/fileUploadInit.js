console.log($('barcode-file-input'));
$('barcode-file-input').bind('change', function () {
    var fileName = '';
    fileName = $(this).val();
    alert(fileName);
    $('#barcode-file-label').innerText=fileName;
})
