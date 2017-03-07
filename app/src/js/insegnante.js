$(document).ready(function(){

    /* variabili */
    var autobreak1;
    var autobreak2;
    var autobreak3;

    // gestione tab boostrap  
    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
    } );

    /**
     * [quando clicchi il tab creami la tabella]
     * @return {[table]}   [ritorna la tabella con le vecchie firme]
     */
    $('#vecchio_calendario').on( 'click', function () {
        if (!autobreak1) {
            calendario("#tabella2","calendario.php?calendario=vecchie");
            autobreak1 = true;
            
        }
    });

    /**
     * [quando clicchi il tab creami la tabella]
     * @return {[table]}   [ritorna la tabella con le vecchie firme max 7 giorni]
     */
    $('#calendario7g').on( 'click', function () {
        if (!autobreak2) {
            calendario("#tabella3","calendario.php?calendario=7g");
            autobreak2 = true;
            
        }
    });

    /**
     * [quando clicchi il tab creami la tabella]
     * @return {[table]}   [ritorna la tabella con le vecchie firme aggiornete all'ora]
     */
    $('#calendarioora').on( 'click', function () {
        if (!autobreak3) {
            calendario("#tabella4","calendario.php?calendario=ora");
            autobreak3 = true;
            
        }
    });

    calendario("#tabella1","calendario.php?calendario=oggi");    

});

/* funzioni */


function calendario (tabella,file){
    $(tabella).DataTable({
        "processing": true,
        ajax: {
            url: file,
            dataSrc: ''
        },
        "columns": [
            { "data": "id" },
            { "data": "insegnante" },
            { "data": "classe" },
            { "data": "materia" },
            { "data": "codice" },
            { "data": "giorno" },
            { "data": "orario" }
        ],
        "columnDefs": [
            {
                "targets": 0 ,
                "visible": false,
                "searchable": false
            }
        ],
        "order": [[ 0, "asc" ]],
        dom: '<"row"<"col-md-2 col-sm-3 col-xs-4"l><"col-md-4 col-sm-5 col-xs-8"B><"col-md-offset-4 col-sm-offset-0 col-xs-offset-0 col-md-2 col-sm-4 col-xs-12"f>>rt<"raw"<"col-md-6"i><"col-md-6"p>>',
        buttons: [
            'print',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "language":{
            "decimal":        "",
            "emptyTable":     "Non è stato trovato alcun risultato",
            "info":           "Mostra da _START_ a _END_ valori nella pagina. Valori totali _TOTAL_.",
            "infoEmpty":      "Non è stato trovato alcun risultato",
            "infoFiltered":   "(Filtrato dai _MAX_ valori totali)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostra _MENU_ valori",
            "loadingRecords": "Caricamento...",
            "processing":     "Attendere...",
            "search":         "Cerca:",
            "zeroRecords": "Non è stato trovato alcun risultato",
            "paginate": {
                "first":      "Prima",
                "last":       "ultima",
                "next":       "Prossima",
                "previous":   "Precedente"
            },
            "aria": {
                "sortAscending":  ": attiva l'ordinamento delle colonne ascendente",
                "sortDescending": ": attiva l'ordinamento delle colonne descendente"
            }
        }
    });
} 