# Brief summary
### This website was developed in the class of LTW2022/2023
- The goal was to develop a website capable of ticket exchange and management between different users in order to solve problems issued by the them.
- Project made by Joao Miguei Vieira Cardoso (up202108732), Isabel Maria Lima Coutinho (up202108767), HaoChang Fu (up202108730).

# Project
## NightSolve 
#### This website is a ticket exchange website built on the basis of problem solving between different users who belong to different departments, in a company or similar;   Ideal for companies that work at night.
### Main features (check means feature implemented): 
- [x] [Account Creation](readme.md/#screenshots): Website allows users to create their own accounts;  
- [x] **Profile**: Each user has their unique profile that they can edit;
- [x] **Ticket system**: Allows users to communicate with each other via ticket exchange , each ticket belongs to one requester and one solver;
  - - [x] **Ticket history**: Users can check their associated tickets;
  - - [x] **Ticket status**: Users can check their ticket statuses;  
  - - [x] **Messaging**: Each ticket has the ability to let 2 people exchange messages in order to solve a problem raised by the requester;
  - - [x] **Adding tags**: User can add tags to their ticket so other people who wants to answer can see their ticket by checking a tag.
- [X] **FAQs**: Allows users to check most asked questions so they don't have to waste time issuing a ticket;
### Specific features (specific to the priviledges of each user):
### Associated to Agent:
- [x] **Viewing the tickets**: Agents can view and filter the tickets they want to be assigned with;
  - - [x] **Filter by department**:
  - - [x] **Filter by priority**;
  - - [x] **Filter by hashtag**;
  - - [x] **Filter by assigned agent**;
  - - [x] **Filter by department**;
- [x] **Edit a ticket**: User can edit certain info associated with a ticket:
  - - [x] **Change department of a ticket**: Agents can change the dpartment of a ticket issued by a client if it's issued in the wrong department;
  - - [x] **Change status of a ticket**: Agents can change the status of aticket from opem -> assigned -> closed; 
  - - [x] **Edit ticket hashtags**: Agents can add or remove hashtags from a ticket;
  - - [x] **Ticket history**: Agents can check changes done to a ticket in the ticket history;
- [x] **Manage FAQs**: Agents can add and remove FAQs of the website;

### Associated to Admin:
- [x] **Upgrade a user's priviledge**;
- [x] **Add new statuses**;
- [x] **Assign Agents to different departments**;
- [x] **Highest Priviledge**: Means as admin they can do whatever the other types of user can do.

### Technologies used:
- Pages mainly built on HTML;
- Every data is stored in a Sqlite database;
- PHP to retrieve from/insert data to the database and to make templates of certain sections of pages;
- JavaScript to make the website interactive in conjuction with CSS and AJAX (to get data from the server), to style html elements to enhance the user experience;

## Screenshots: 
### Account Creation
