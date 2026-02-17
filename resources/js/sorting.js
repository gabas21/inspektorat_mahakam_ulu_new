let originalRows = [];
let currentSortColumn = -1;
let currentSortDir = ''; // 'asc', 'desc', ''

window.initSorting = function () {
    const table = document.getElementById("documentTable");
    if (!table) return;

    // Store original rows for reset
    // We only want to store the rows, not the whole HTML because logic might depend on objects
    // But cloning nodes is safer for DOM restoration
    originalRows = Array.from(table.rows).slice(1); // Skip header
    currentSortColumn = -1;
    currentSortDir = '';
};

// Call init on load
document.addEventListener('DOMContentLoaded', () => {
    window.initSorting();
});

window.sortTable = function (n) {
    const table = document.getElementById("documentTable");
    if (!table) return;

    // Determine new sort direction
    let dir = "asc";
    if (currentSortColumn === n) {
        if (currentSortDir === "asc") {
            dir = "desc";
        } else if (currentSortDir === "desc") {
            // Reset to default
            resetTable();
            return;
        }
    }

    currentSortColumn = n;
    currentSortDir = dir;

    // Update icons
    updateSortIcons(n, dir);

    let rows, switching, i, x, y, shouldSwitch;
    switching = true;

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];

            if (x.getAttribute('colspan') || y.getAttribute('colspan')) continue;

            let xVal = x.textContent.trim();
            let yVal = y.textContent.trim();

            let xNum = parseFloat(xVal.replace(/,/g, ''));
            let yNum = parseFloat(yVal.replace(/,/g, ''));

            if (!isNaN(xNum) && !isNaN(yNum)) {
                if (dir == "asc") {
                    if (xNum > yNum) { shouldSwitch = true; break; }
                } else if (dir == "desc") {
                    if (xNum < yNum) { shouldSwitch = true; break; }
                }
            } else {
                if (dir == "asc") {
                    if (xVal.toLowerCase() > yVal.toLowerCase()) { shouldSwitch = true; break; }
                } else if (dir == "desc") {
                    if (xVal.toLowerCase() < yVal.toLowerCase()) { shouldSwitch = true; break; }
                }
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
    renumberRows();
};

function resetTable() {
    const table = document.getElementById("documentTable");
    if (!table || originalRows.length === 0) return;

    const tbody = table.querySelector('tbody');
    if (!tbody) return;

    // Clear current rows (keeping header if it's in thead, but table.rows includes everything)
    // Safest way: remove all rows from tbody and append originalRows
    // Assuming standard table structure <table><thead>...</thead><tbody>...</tbody></table>

    // Remove all existing rows from tbody
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    // Append original rows
    originalRows.forEach(row => {
        tbody.appendChild(row);
    });

    currentSortColumn = -1;
    currentSortDir = '';

    // Reset icons
    document.querySelectorAll('.sort-icon').forEach(icon => {
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />';
        icon.classList.remove('text-emerald-500');
        icon.classList.add('text-slate-400', 'opacity-50');
    });

    renumberRows();
}

window.renumberRows = function () {
    const table = document.getElementById("documentTable");
    if (!table) return;

    const rows = table.rows;

    // Try to determine start index from pagination info text
    // "HALAMAN X DARI Y" layout: .pagination-container text content
    let start = 1;
    const paginationInfo = document.querySelector('.pagination-container .text-emerald-600');
    if (paginationInfo) {
        const text = paginationInfo.textContent.trim();
        const match = text.match(/\d+/);
        if (match) {
            const currentPage = parseInt(match[0]);
            start = (currentPage - 1) * 5 + 1; // Assuming 5 items per page
        }
    }

    let count = start;
    for (let i = 1; i < rows.length; i++) {
        const firstCell = rows[i].cells[0];
        if (firstCell && !firstCell.getAttribute('colspan')) {
            firstCell.textContent = count++;
        }
    }
};

window.updateSortIcons = function (n, dir) {
    document.querySelectorAll('.sort-icon').forEach(icon => {
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />';
        icon.classList.remove('text-emerald-500');
        icon.classList.add('text-slate-400', 'opacity-50');
    });

    const headers = document.querySelectorAll('#documentTable th');
    if (headers[n]) {
        const icon = headers[n].querySelector('.sort-icon');
        if (icon) {
            icon.classList.remove('text-slate-400', 'opacity-50');
            icon.classList.add('text-emerald-500');
            if (dir === 'asc') {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />'; // Up arrow
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />'; // Down arrow
            }
        }
    }
};
