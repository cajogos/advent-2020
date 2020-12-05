from utils import get_inputs_from_file, find_row_seat, find_col_seat

inputs = get_inputs_from_file('input.txt')

higher_id = -1
for i in inputs:
    row = i[:7] # Row information 0 - 127
    col = i[7:] # Column information 0 - 7

    row_seat = find_row_seat(row, 0, 127)
    col_seat = find_col_seat(col, 0, 7)
    seat_id = (row_seat * 8) + col_seat

    if seat_id > higher_id:
        higher_id = seat_id

print("Highest ID", higher_id)
