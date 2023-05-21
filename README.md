# Brief summary
### This website was developed in the class of LTW2022/2023
- The goal was to develop a website capable of ticket exchange and management between different users in order to solve problems issued by the them.
- Project made by Joao Miguel Vieira Cardoso (up202108732), Isabel Maria Lima Coutinho (up202108767), HaoChang Fu (up202108730).

# Project
## NightSolve 
#### This website is a ticket exchange website built on the basis of problem solving between different users who belong to different departments, in a company or similar;   Ideal for companies that work at night.
### Main features (check means feature implemented): 
- [x] [**Account Creation**](#account-creation): Website allows users to create their own accounts;  
- [x] [**Profile**](#profile): Each user has their unique profile that they can edit;
- [x] [**Ticket system**](#ticket-system): Allows users to communicate with each other via ticket exchange , each ticket belongs to one requester and one solver;
  - - [x] **Ticket history**: Users can check their associated tickets;
  - - [x] **Ticket status**: Users can check their ticket statuses;  
  - - [x] **Messaging**: Each ticket has the ability to let 2 people exchange messages in order to solve a problem raised by the requester;
  - - [x] **Adding tags**: User can add tags to their ticket so other people who wants to answer can see their ticket by checking a tag.
- [X] [**FAQs**](#faqs): Allows users to check most asked questions so they don't have to waste time issuing a ticket;
### Specific features (specific to the priviledges of each user):
### Associated to Agent:
- [x] [**Viewing the tickets**](#viewing-the-tickets): Agents can view and filter the tickets they want to be assigned with;
  - - [x] **Filter by department**:
  - - [x] **Filter by priority**;
  - - [x] **Filter by hashtag**;
  - - [x] **Filter by assigned agent**;
  - - [x] **Filter by department**;
- [x] [**Edit a ticket**](#edit-a-ticket): User can edit certain info associated with a ticket:
  - - [x] **Change department of a ticket**: Agents can change the dpartment of a ticket issued by a client if it's issued in the wrong department;
  - - [x] **Change status of a ticket**: Agents can change the status of aticket from opem -> assigned -> closed; 
  - - [x] **Edit ticket hashtags**: Agents can add or remove hashtags from a ticket;
  - - [x] **Ticket history**: Agents can check changes done to a ticket in the ticket history;
- [x] [**Manage FAQs**](#faqs): Agents can add and remove FAQs of the website;

### Associated to Admin:
- [x] [**Upgrade a user's priviledge**](#upgrade-priviledge);
- [x] [**Add new statuses**](#add-new-statuses);
- [x] [**Assign Agents to different departments**](#assign-agents-to-departments);
- [x] **Highest Priviledge**: Means as admin they can do whatever the other types of user can do.

### Technologies used:
- Pages mainly built on HTML;
- Every data is stored in a Sqlite database;
- PHP to retrieve from/insert data to the database and to make templates of certain sections of pages;
- JavaScript to make the website interactive in conjuction with CSS and AJAX (to get data from the server), to style html elements to enhance the user experience;

### References:
- https://www.youtube.com/watch?v=VnvzxGWiK54;
- https://www.youtube.com/watch?v=ziq_TVhnFU8;

## Screenshots:
### Account Creation
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/56fb6eba-e8be-458c-a43a-ab79baaa4c71)
### Profile
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/97cad4ae-8c26-4773-9726-4f234735a5a4)
### Ticket System
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/1c81c73f-05ea-4124-b423-833eee9d862a)
### FAQs
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/cf4df7b8-cc3a-4e36-886d-c6e404703fb0)
### Viewing the tickets
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/d7c24a80-8e75-4a9b-b762-06488ced990b)
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/d7a11415-3edf-4d77-97f5-f11199122d57)
### Edit a ticket
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/f6d3ef5e-0766-44ca-8fd6-cf18be8dfbc8)
### View ticket history
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/35d4eac7-23ca-4e32-90f2-cc9ec0846fe1)
### Talk with Assigned Agent
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/95cafc78-b52d-41c9-9278-82e28bdbf6e0)
### Upgrade priviledge
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/2248ebba-03fc-499f-9b60-85af6349536c)
### Add new statuses
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/4f4238ac-2301-4e3b-94fb-c6197a28fa7c)
### Assign Agents to departments
![image](https://github.com/FEUP-LTW-2023/project-ltw14g04/assets/95939460/8a428f12-e989-4703-a911-1b44dd8c94d2)
