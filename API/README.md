# API for Information Broadcaster

## Getting started
- GET /messages : Get all messages
- GET /messages/{id} : Get a message by id
- POST /messages/new : Create a message (Necessaries Queries :  content, user_id, image (don't set this if null))
- PUT /messages/update/{id} : Update a message by id (Necessaries Queries :  content, image (don't set this if null))
- DELETE /messages/delete/{id} : Delete a message by id
