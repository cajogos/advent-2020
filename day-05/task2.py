from utils import get_inputs_from_file, find_row_seat, find_col_seat

inputs = get_inputs_from_file('input.txt')

ids = []
for i in inputs:
    row = i[:7] # Row information 0 - 127
    col = i[7:] # Column information 0 - 7

    row_seat = find_row_seat(row, 0, 127)
    col_seat = find_col_seat(col, 0, 7)
    seat_id = (row_seat * 8) + col_seat

    ids.append(seat_id)

# Sort the IDs
ids.sort()

prev = -1
for id in ids:
    if prev == -1:
        prev = id
        continue

    # Continue if the ID works
    if (prev == (id - 1)):
        prev = id
        continue

    # Find the initial ID that breaks the loop
    your_id = id - 1
    print("Your seat ID", your_id)
    break
