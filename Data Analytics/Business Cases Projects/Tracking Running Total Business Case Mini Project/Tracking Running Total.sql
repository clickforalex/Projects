Select 
    SalesEmployeeID, 
    SaleDate, 
    SaleAmount,
    SUM(SaleAmount) Over(Partition By SalesEmployeeID order by SaleDate) Running_Total,
    cast(SUM(SaleAmount) Over(Partition By SalesEmployeeID order by SaleDate) as float)/Quota as Percent_Quota
From
Sales as s
join 
Employees as e
on S.SalesEmployeeID = e.EMPLOYEEID
Order By SalesEmployeeID, SaleDate