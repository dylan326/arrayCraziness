# arrayCraziness
How to work with a poorly designed database.  See readme to understand


Explanation:

The goal here was to output users data requests (when a user requests information from a franchise they're interested in). 
The data has alredy been submitted to the database by another dev.  The table is this:

User_id     Franchise_ids
34           4,6,7,2
79           5,6
79           8,22
41           1,5
79           4,7,21,3

The franchise_ids are ID fields in another table named franchise and I need data(the franchise name) from this table. 

