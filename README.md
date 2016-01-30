Budget Plugin for Kanboard
==========================

[![Build Status](https://travis-ci.org/kanboard/plugin-budget.svg?branch=master)](https://travis-ci.org/kanboard/plugin-budget)


- Create budget lines
- See expenses based on sub-task time tracking
- Manage user hourly rates

Author
------

- Frederic Guillot
- License MIT

Installation
------------

- Decompress the archive in the `plugins` folder

or

- Create a folder **plugins/Budget**
- Copy all files under this directory

Documentation
-------------

### Budget management

Budget management is based on the sub-task time tracking, the user timetable and the user hourly rate.

This section is available from project settings page: **Project > Budget**. There is also a shortcut from the drop-down menu on the board.

#### Budget Lines

![Cost Lines](http://kanboard.net/screenshots/documentation/budget-lines.png)

Budget lines are used to define a budget for the project.
This budget can be adjusted by adding a new entry with an effective date.

#### Cost Breakdown

![Cost Breakdown](http://kanboard.net/screenshots/documentation/budget-cost-breakdown.png)

Based on the subtask time tracking table and user information you can see the cost of each subtask.

The time spent is rounded to the nearest quarter.

#### Budget Chart

![Budget Graph](http://kanboard.net/screenshots/documentation/budget-graph.png)

Finally, by combining all information we can generate a graph:

- Expenses represent user costs
- Budget lines are the provisioned budget
- Remaining is the budget left at the given time

### Hourly Rate

Each user can have a pre-defined hourly rate.
This feature is used for budget calculation.

To define a new price, go to **User profile > Hourly rates**.

![Hourly Rate](http://kanboard.net/screenshots/documentation/hourly-rate.png)

Each hourly rate can have an effective date and different currencies.
