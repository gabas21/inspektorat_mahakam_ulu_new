/**
 * Dokumen Table Search
 * Used by all 8 dokumen pages (sakip, spip, lhkpn, etc.)
 * Expects: #searchInput, #documentTable
 */
(function () {
    'use strict';

    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return;

    searchInput.addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let rs = document.querySelectorAll('#documentTable tbody tr');
        let noDataMsgRow = document.querySelector('#documentTable tbody tr:last-child');
        let isNoDataRowPresent = noDataMsgRow && noDataMsgRow.querySelector('.flex.flex-col.items-center');

        let hasVisibleRow = false;

        rs.forEach(row => {
            if (isNoDataRowPresent && row === noDataMsgRow) {
                row.style.display = 'none';
                return;
            }

            if (row.cells.length < 2) return;

            let no = row.cells[0].textContent.toLowerCase().trim();
            let name = row.cells[1].textContent.toLowerCase().trim();

            if (no.includes(filter) || name.includes(filter)) {
                row.style.display = '';
                hasVisibleRow = true;
            } else {
                row.style.display = 'none';
            }
        });

        if (!hasVisibleRow && isNoDataRowPresent) {
            noDataMsgRow.style.display = '';
        } else if (isNoDataRowPresent) {
            noDataMsgRow.style.display = 'none';
        }
    });
})();
