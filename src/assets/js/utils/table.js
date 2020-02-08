export const createRow = (cells = []) => {
    const row = document.createElement('tr');
    cells.forEach((value, index) => row.insertCell(index).innerHTML = value);
    return row;
}
