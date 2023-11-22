**Task manager**

This is an implementation of an API that will allow you to manage a list of tasks.

The API provides the ability to:

    • get a list of your tasks according to the filter
    • create your task
    • edit your task
    • mark your task as completed
    • delete your task

***

**Recommendations:**

    • accompany this task with Open API documentation
    • wrap the project in docker-compose

***

**Architecture:**

    • use as much functionality built into the framework as possible
    • use the service layer for business logic
    • use repositories to retrieve data from the database
    • use DTOs
    • use Enum
    • use strict typing
    • use the REST approach for routing
    • use recursion or references to form a tree of tasks
***

**to build docker container: use:**

make dc-build

then install packages for vendors:

make bash

composer update

exit


***

**to start the program, use:**

make dc-up


**it will be possible to test the application in a browser at localhost**

   http://localhost - You will see a frontend built using Symfony

   http://localhost/doc - Swagger API documentation


