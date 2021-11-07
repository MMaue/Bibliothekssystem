import sys
import hashlib

print(hashlib.sha256(bytes(sys.argv[1], encoding='utf-8')).hexdigest())
