from utils import is_valid_password2, get_inputs_from_file

inputs = get_inputs_from_file('input.txt')

valid_passwords = 0
for password_input in inputs:
    policy = password_input.split(':')[0].strip()
    password = password_input.split(':')[1].strip()
    valid = is_valid_password2(policy, password)
    if (valid):
        valid_passwords = valid_passwords + 1

print("Number of valid password: " + str(valid_passwords))
