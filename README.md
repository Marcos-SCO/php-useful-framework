# Database connection with Query builder Functions

Database connection with query builder Functions example

# Select 
$select = $db->select('users');
"SELECT * FROM users"

# Insert 
$insert = $db->insert('bands', ['name' => 'Iron Maiden', 'email' => 'ironmaiden@outlook.com']);
----------------
"INSERT INTO users name, email VALUES ('Iron Maiden', 'ironmaiden@outlook.com')"

# Update
$update = $db->update('users', ['name' => 'haha', 'email' => 'haha@outlook.com'], ['id', 8]);
----------------
"UPDATE users set name = 'haha', email = haha@outlook.com WHERE id = 8"

# Delete
$delete = $db->delete('languages', ['name' => 'java', 'id' => 1]);
----------------
"DELETE FROM languages WHERE name = 'java' and id = 1"

# Custom query
$customQuery = $db->customQuery("SELECT email FROM users WHERE id = :id AND email = :email", ['id' => 2, 'email' => 'marcos_sco@outlook.com']);