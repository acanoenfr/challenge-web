# API for Information Broadcaster

## Getting started

Messages :
- GET /messages : Get all messages
- GET /messages/{id} : Get a message by id
- POST /messages/new : Create a message (Necessaries Queries :  content, user_id, image (don't set this if null))
- PUT /messages/update/{id} : Update a message by id (Necessaries Queries :  content, image (don't set this if null))
- DELETE /messages/delete/{id} : Delete a message by id

Users :
- GET /users : Get all messages
- GET /users/{id} : Get a message by id
- POST /users/new : Create a message (Necessaries Queries :  username, password (don't set this if null))
- PUT /users/update/{id} : Update a message by id (Necessaries Queries : username, role, password (don't set this if null))
- DELETE /users/delete/{id} : Delete a message by id
