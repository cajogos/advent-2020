import os

def is_valid_password(policy, password):
    lower_upper = policy.split(' ')[0]
    lower = int(lower_upper.split('-')[0])
    upper = int(lower_upper.split('-')[1])
    letter = policy.split(' ')[1]

    count = 0
    for l in password:
        if (l == letter):
            count = count + 1

    return (count >= lower and count <= upper)

inputs = [
    "1-3 a: abcde",
    "1-3 b: cdefg",
    "2-9 c: ccccccccc"
]

path = os.path.dirname(os.path.realpath(__file__))
filename = path + "/input.txt"
print(filename)

inputs = open(filename).read().strip().split('\n')


valid_passwords = 0

for password_input in inputs:
    policy = password_input.split(':')[0].strip()
    password = password_input.split(':')[1].strip()
    valid = is_valid_password(policy, password)
    if (valid):
        valid_passwords = valid_passwords + 1


print("Number of valid password: " + str(valid_passwords))
