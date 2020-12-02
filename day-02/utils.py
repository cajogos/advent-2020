import os

def get_inputs_from_file(file):
    path = os.path.dirname(os.path.realpath(__file__))
    filename = path + "/" + file
    return open(filename).read().strip().split('\n')

def is_valid_password1(policy, password):
    lower_upper = policy.split(' ')[0]
    lower = int(lower_upper.split('-')[0])
    upper = int(lower_upper.split('-')[1])
    letter = policy.split(' ')[1]

    # Count occurrences of the letter in the given password
    count = 0
    for l in password:
        if (l == letter):
            count = count + 1

    return (count >= lower and count <= upper)

def is_valid_password2(policy, password):
    lower_upper = policy.split(' ')[0]
    pos1 = int(lower_upper.split('-')[0])
    pos2 = int(lower_upper.split('-')[1])
    letter = policy.split(' ')[1]

    # First position has the right one
    valid = password[pos1 - 1] == letter
    if (valid):
        # It is only valid if the other does not match letter
        return (password[pos2 - 1] != letter)
    else:
        # Second position is only valid if the first position is not
        return (password[pos2 - 1] == letter)