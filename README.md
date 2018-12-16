# arrayCraziness
How to work with a poorly designed database. 


Explanation:

The goal here was to output users data requests (when a user requests information from a franchise they're interested in). 
The data has alredy been submitted to the database.  The table is just a ID(pk) user_id field(fk), a franchise_ids field (which is a string like '5,6,8,2') and a datetime field



The franchise_ids are ID fields in another table named franchise and I need data(the franchise name) from this table. I have to cut the string, convert to int and on top of this not output duplicates.  

