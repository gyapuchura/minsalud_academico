function openModelPDF(url) {
    $('#modalPdf').modal('show');
    $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/empresas-publicas/'; ?>'+url);
}