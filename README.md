# Simple framework project with php


# Query Builder usage
- Select
  - $select = $db->select('users');

- Custom query with select
  - $customQuery = $db->customQuery("SELECT email FROM users WHERE id = :id AND email = :email", ['id' => 97, 'email' => 'marcos_sco@outlook.com']);

- Insert example
  - $insert = $db->insert('games', ['name' => 'Persona', 'company' => 'Atlus']);

- Update
  - $update = $db->update('games', ['name' => 'Street Fighter 2', 'year' => 1992], ['id',8]);

- Delete by name and company
  - $delete = $db->delete('games', ['name' => 'Sonic 2006', 'company' => 'sega']);
  - DELETE WHERE name = :name AND company = : company

- Delete by id
  - $delete = $db->delete('games', ['id' => 5]);