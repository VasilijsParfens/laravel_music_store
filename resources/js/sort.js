function sortTable(columnIndex) {
    const table = document.querySelector('.sortable-table');
    const rows = Array.from(table.querySelectorAll('tbody tr'));
    const isAscending = table.getAttribute('data-sort-order') === 'asc';

    // Determine sorting direction
    const sortMultiplier = isAscending ? 1 : -1;

    // Sort rows based on the selected column
    rows.sort((rowA, rowB) => {
        const cellA = rowA.querySelectorAll('td')[columnIndex].textContent.trim();
        const cellB = rowB.querySelectorAll('td')[columnIndex].textContent.trim();

        return cellA.localeCompare(cellB) * sortMultiplier;
    });

    // Reorder the table rows
    table.querySelector('tbody').innerHTML = '';
    rows.forEach(row => table.querySelector('tbody').appendChild(row));

    // Update sort order attribute
    table.setAttribute('data-sort-order', isAscending ? 'desc' : 'asc');
}

document.addEventListener('DOMContentLoaded', function() {
    // Attach click event listeners to table headers for sorting
    const headers = document.querySelectorAll('.sortable-header');
    headers.forEach((header, index) => {
        header.addEventListener('click', () => sortTable(index));
    });
});
