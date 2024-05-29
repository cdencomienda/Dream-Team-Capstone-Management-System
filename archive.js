const search = document.querySelector('.input-group input');
const table_rows = document.querySelectorAll('tbody tr');
const table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase();
        let search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    });

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.addEventListener('click', () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        });

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    });
});


function sortTable(column, sort_asc) {
    const sortedRows = [...table_rows].sort((a, b) => {
        const first_row = a.querySelectorAll('td')[column].textContent.toLowerCase();
        const second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row > second_row ? 1 : -1) : (first_row < second_row ? 1 : -1);
    });

    sortedRows.forEach(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}

// 3. Converting HTML table to PDF

const pdf_btn = document.querySelector('#toPDF');
const customers_table = document.querySelector('#customers_table');


const toPDF = function (customers_table) {
    const html_code = `
    <!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            ${customers_table.innerHTML}
        </body>
    </html>`;

    const new_window = window.open();
    new_window.document.write(html_code);

    setTimeout(() => {
        new_window.print();
        new_window.close();
    }, 400);
};

pdf_btn.addEventListener('click', () => {
    toPDF(customers_table);
});

document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('tbody tr');
    const modal = document.getElementById('pdfModal');
    const modalContent = document.querySelector('.modal-content');
    const pdfFrame = document.getElementById('pdf-frame');
    const span = document.getElementsByClassName('closeM')[0];

    rows.forEach(row => {
        row.addEventListener('click', function() {
            const filePath = row.getAttribute('data-file');
            pdfFrame.src = filePath;
            modal.style.display = 'block';
        });
    });

    span.onclick = function() {
        modal.style.display = 'none';
        pdfFrame.src = '';  // Clear the src to stop the PDF from loading
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
            pdfFrame.src = '';  // Clear the src to stop the PDF from loading
        }
    };
});
