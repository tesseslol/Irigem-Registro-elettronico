$(document).ready(function(){

    /* variabili main */
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
    $('#vecchie_firme').on( 'click', function () {
        if (!autobreak1) {
            firme_insegnanti('#tabella2','firme.php?firme=vecchie');
            autobreak1 = true;

        }
    });

    /**
     * [quando clicchi il tab creami la tabella]
     * @return {[table]}   [ritorna la tabella con le vecchie firme max 7 giorni]
     */
    $('#firme7g').on( 'click', function () {
        if (!autobreak2) {
            firme_insegnanti('#tabella3','firme.php?firme=7g');
            autobreak2 = true;

        }
    });

    /**
     * [quando clicchi il tab creami la tabella]
     * @return {[table]}   [ritorna la tabella con le vecchie firme aggiornete all'ora]
     */
    $('#firmeora').on( 'click', function () {
        if (!autobreak3) {
            firme_insegnanti('#tabella4','firme.php?firme=ora');
            autobreak3 = true;

        }
    });

    firme_insegnanti('#tabella1','firme.php?firme=oggi');

});

/* funzioni */

/**
 * [firme_insegnanti , genera tabella firme per la segretaria ]
 * @param  {[stringa]} tabella [Nome id della tabella preceduto da #]
 * @param  {[stringa]} file    [File php per generare la risposta]
 * @return {[table]}           [Crea una tabella e la ordina per id. La colonna id
 *                                   non è visibile e e ne cercabile e la colonna
 *                                   materia è invisibile e cercabile ]
 */
function firme_insegnanti (tabella,file){
    $(tabella).DataTable({
        'processing': true,
        ajax: {
            url: file,
            dataSrc: ''
        },
        'columns': [
            { 'data': 'id' },
            { 'data': 'classe' },
            { 'data': 'insegnante' },
            { 'data': 'materia' },
            { 'data': 'codice' },
            { 'data': 'ora' },
            { 'data': 'data' },
            { 'data': 'assenti' },
            { 'data': 'entrata' },
            { 'data': 'uscita' }
        ],
        'columnDefs': [
            {
                'targets': 0 ,
                'visible': false,
                'searchable': false
            },
            {
                'targets': 3 ,
                'visible': false,
                'searchable': true
            }
        ],
        'order': [[ 0, 'asc' ]],
        dom: '<"row"<"col-md-4 col-sm-3 col-xs-6"l><"col-md-2 col-sm-4 col-xs-6"B><"col-md-6 col-sm-4 col-xs-12"f>>rt<"raw"<"col-md-6"i><"col-md-6"p>>',
        buttons: [
            'print',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        'language':{
            'decimal':        '',
            'emptyTable':     'Non è stato trovato alcun risultato',
            'info':           'Mostra da _START_ a _END_ valori nella pagina. Valori totali _TOTAL_.',
            'infoEmpty':      'Non è stato trovato alcun risultato',
            'infoFiltered':   '(Filtrato dai _MAX_ valori totali)',
            'infoPostFix':    '',
            'thousands':      ',',
            'lengthMenu':     'Mostra _MENU_ valori',
            'loadingRecords': 'Caricamento...',
            'processing':     'Attendere...',
            'search':         'Cerca:',
            'zeroRecords': 'Non è stato trovato alcun risultato',
            'paginate': {
                'first':      'Prima',
                'last':       'ultima',
                'next':       'Prossima',
                'previous':   'Precedente'
            },
            'aria': {
                'sortAscending':  ': attiva l\'ordinamento delle colonne ascendente',
                'sortDescending': ': attiva l\'ordinamento delle colonne descendente'
            }
        }
    });
}
