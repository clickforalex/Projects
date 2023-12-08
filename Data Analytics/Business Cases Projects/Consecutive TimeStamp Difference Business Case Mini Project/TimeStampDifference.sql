Select 
    *,
    lead(MOVEMENTDATE, 1) Over(partition by SUBSCRIPTIONID order by MOVEMENTDATE) as NextStatusMovementDate,
    lead(MOVEMENTDATE, 1) Over(partition by SUBSCRIPTIONID order by MOVEMENTDATE) - MovementDate as TIMEINSTATUS
From paymentstatuslog
where subscriptionid = '38844'
order by movementdate
