SELECT 
    CustomerID,
    COUNT(PRODUCTID) AS Num_Products,
    SUM(numberofusers) AS Total_Users,
    CASE 
        WHEN SUM(numberofusers) >= 5000 OR COUNT(PRODUCTID) = 1 THEN 1
        ELSE 0
    END AS Upsell_Opportunity
FROM subscriptions
Group by CustomerID
