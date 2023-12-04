WITH max_status_reached AS (
SELECT 
    subscriptionid, 
    MAX(statusid) AS maxstatus 
FROM paymentstatuslog
GROUP BY subscriptionid
)
,
paymentfunnelstages AS (
SELECT 
    subs.subscriptionid,
    CASE 
        WHEN maxstatus = 1 THEN 'PaymentWidgetOpened'
        WHEN maxstatus = 2 THEN 'PaymentEntered'
        WHEN maxstatus = 3 AND currentstatus = 0 THEN 'User Error with Payment Submission'
        WHEN maxstatus = 3 AND currentstatus != 0 THEN 'Payment Submitted'
        WHEN maxstatus = 4 AND currentstatus = 0 THEN 'Payment Processing Error with Vendor'
        WHEN maxstatus = 4 AND currentstatus != 0 THEN 'Payment Success'
        WHEN maxstatus = 5 THEN 'Complete'
        WHEN maxstatus IS NULL THEN 'User did not start payment process'
    END AS paymentfunnelstage
    FROM Subscriptions AS subs
    LEFT JOIN max_status_reached as m ON subs.subscriptionid = m.subscriptionid
)
SELECT 
    paymentfunnelstage, 
    COUNT(subscriptionid) AS subscriptions
FROM paymentfunnelstages
GROUP BY paymentfunnelstage;
