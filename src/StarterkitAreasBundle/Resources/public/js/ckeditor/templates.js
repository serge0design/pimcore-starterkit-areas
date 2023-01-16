CKEDITOR.addTemplates('default', {
    templates: [{
        title: 'Liste mit Überschrift (H5)',
        description: '',
        html: '<h5 class="listing-title">Überschrift</h5>' +
            '<ul>' +
            '<li>Listenelement</li>' +
            '</ul>'
    }, {
        title: 'Liste (Listengruppe/Flush) mit Überschrift (H5) ',
        description: 'ul whit list-group list-group-flush classes',
        html: '<h5 class="listing-title">Überschrift</h5>' +
            '<ul class="list-group list-group-flush">' +
            '<li>Listenelement</li>' +
            '</ul>'
    }, {
        title: 'Bootstrap Default Card Body',
        description: 'Default Content',
        html: '<h5 class="card-title">Überschrift</h5>' +
            '<p className="card-text">With supporting text below as a natural lead-in to additional content.</p>' +
            '<a href="#" className="btn btn-primary">Button</a>'
    }, {
        title: 'Tabelle Tarife',
        description: '',
        html: '<h5>AddOrDelete</h5>' +
            '<table style="width:100%;" class="table table-tairfe"><tbody>' +
            '<tr data-trSeason="regular-season">' +
            '<td data-tdTxtRegularSeason>Regular Season</td>' +
            '<td>CHF </td>' +
            '</tr>' +
            '<tr data-trSeason="hight-season">' +
            '<td data-tdTxtHightSeason>Hight Season</td>' +
            '<td>CHF </td>' +
            '</tr>' +
            '</tbody></table>' +
            '<p>AddOrDelete</p>'
    }]
});