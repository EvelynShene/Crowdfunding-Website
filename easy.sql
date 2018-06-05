# This records some database problems or materials related to MySQL.

595. Big Countries:
# A country is big if it has an area of bigger than 3 million square km or a population of more than 25 million.
# Write a SQL solution to output big countries' name, population and area

  select name,population,area 
  from World
  where area > 3000000 or population > 25000000
  
627. Swap Salary
# Swap all f and m values (i.e., change all f values to m and vice versa) 
# with a single update query and no intermediate temp table
  
  update salary set sex = case
  when sex = 'f' then 'm'
  else 'f'
  end
  
620. Not Boring Movies
# Output movies with an odd numbered ID and a description that is not 'boring'. 
# Order the result by rating

  select *
  from cinema
  where mod(id,2) = 1 and description != 'boring'
  order by rating desc
  
182. Duplicate Emails
# Find all duplicate emails in a table named Person
  
  select distinct Email
  from Person 
  group by Email
  having count(id) > 1
  
175.Combine Two Tables
# "for each" join

  select FirstName, LastName, City, State
  from Person left join Address
  on Person.PersonId = Address.PersonId

181. Employees Earning More Than Their Managers

  select E.Name as Employee
  from Employee E, Employee T
  where E.ManagerId = T.id and E.Salary > T.Salary;
  
183. Customers Who Never Order
# Find all customers who never order anything
  
  select Name as Customers
  from Customers
  where id not in 
      (select CustomerId
      from Orders)
      
197. Rising Temperature
# Find all dates' Ids with higher temperature compared to its previous (yesterday's) dates

  select A.id
  from Weather A, Weather B
  where DATEDIFF(A.Date,B.Date) = 1 and A.Temperature >B.Temperature;
  
596. Classes More Than 5 Students
# Please list out all classes which have more than or equal to 5 students

  select class
  from courses
  group by class
  having count(distinct student)>=5;
 
196. Delete Duplicate Emails
# Delete all duplicate email entries in a table named Person, 
# keeping only unique emails based on its smallest Id

  delete P from Person P, Person S
  where P.Id>S.Id and P.email = S.email;

176. Second Highest Salary
# Get the second highest salary from the Employee table
  
  select max(E.Salary) as SecondHighestSalary
  from(select max(Salary) as maxs
  from Employee) as M, Employee E
  where E.Salary < maxs
