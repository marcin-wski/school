import hashlib as hasher

class Block:
    def __init__(self, index, data, previous_hash):
        self.index = index
        self.data = data
        self.previous_hash = previous_hash
        self.hash = self.hash()

    def hash(self):
        sha = hasher.sha256()
        sha.update(str(self.index) + str(self.data) + str(self.previous_hash))
        return sha.hexdigest()

def first_block():
    return Block(0, "First", "0")

def next_block(last_block):
    new_index = last_block.index + 1
    new_data = "This is block " + str(new_index)
    new_hash = last_block.hash
    return Block(new_index, new_data, new_hash)

blockchain = [first_block()]
last_block = blockchain[0]
blocks_to_add = 8

for i in range(0, blocks_to_add):
    adding_block = next_block(last_block)
    blockchain.append(adding_block)
    last_block = adding_block
    print "This is Block #{} being added to the blockchain".format(adding_block.index)
    print "Hash: {}\n".format(adding_block.hash) 