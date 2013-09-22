zencart-bitcoin-auto-updater
============================

Zencart script which updates the price of bitcoin in the database, price based on CoinDesk BPI
  
If you use our scripts please donate!   

BTC: 1PZUq2MaaJc3uiwjU3kwpEsYQHHj5u5KKE
 
Step 1:  Add Bitcoin as a currency in the zencart BTC module

Step 2: look in your mysql database in YOURDB > Currencies > Bitcoin and find the currency_id

Step 3: edit the script with your database information

Step 4: Step chron job to run the script every two minutes using curl
