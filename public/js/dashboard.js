/* globals Chart:false, feather:false */

(function () {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' });

  new DataTable('#groupstable',{
    pageLength: 10,
    order: [],
    lengthChange: false,
    language: {
      url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/es-CO.json',
  },
  });
})()
