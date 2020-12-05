import os

def get_inputs_from_file(file):
    path = os.path.dirname(os.path.realpath(__file__))
    filename = path + "/" + file
    return open(filename).read().strip().split('\n')

def find_row_seat(row, min, max):
    row_seat = 0
    for l in row:
        # print("Min", min, "Max", max)
        if (l == 'F'):
            max = (max + min) / 2
            row_seat = max
        elif l == 'B':
            min = ((max + min) / 2) + 1
            row_seat = min
    return row_seat


def find_col_seat(col, min, max):
    col_seat = 0
    for l in col:
        # print("Min", min, "Max", max)
        if (l == 'L'):
            max = (max + min) / 2
            col_seat = max
        elif l == 'R':
            min = ((max + min) / 2) + 1
            col_seat = min
    return col_seat