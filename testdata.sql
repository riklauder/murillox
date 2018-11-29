use murillox;

insert into ticker (t_id, companyname, ticker) values (1, "Murrillo SX", "MUSX");
insert into stockmarket(t_id, currentvalue, openingvalue, closingvalue, stock_date) values (1, 69.00, 60.00, 69.00, NOW());

insert into account (acc_id, balance) values (NULL, 10000.00);
insert into users (c_id, username, firstname, lastname, email, user_type, password, acc_id) values (1, "bob", "admin", "user", "admin@murillox.ca", "admin", "123", LAST_INSERT_ID());
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, LAST_INSERT_ID(), 1, 1);

insert into account (acc_id, balance) values (NULL, 10000.00);
insert into users (c_id, username, firstname, lastname, email, user_type, password, acc_id) values (2, "relauder", "Richard", "Lauder", "relauder@lakeheadu.ca", "user", "123", LAST_INSERT_ID());
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, LAST_INSERT_ID(), 1, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 2, 16, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 2, 25, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 2, 4, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 2, 17, 10);

insert into account (acc_id, balance) values (NULL, 10000.00);
insert into users (c_id, username, firstname, lastname, email, user_type, password, acc_id) values (3, "dylan", "dylan", "ng", "dylanlcn@gmail.com", "user", "123", LAST_INSERT_ID());
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, LAST_INSERT_ID(), 1, 10);


insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 4, 1, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 4, 16, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 4, 25, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 4, 4, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 4, 22, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 4, 27, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 4, 9, 10);
insert into portfolio (p_id, c_id, t_id, numshares) value (NULL, 4, 3, 10);

insert into ticker (t_id, companyname, ticker) values (2, "3M Company", "MMM");
insert into ticker (t_id, companyname, ticker) values (3, "American Express Company", "AXP");
insert into ticker (t_id, companyname, ticker) values (4, "Apple Inc.", "AAPL");
insert into ticker (t_id, companyname, ticker) values (5, "Caterpillar Inc.", "CAT");
insert into ticker (t_id, companyname, ticker) values (6, "Chevron Corporation", "CVX");
insert into ticker (t_id, companyname, ticker) values (7, "Cisco Systems, Inc.", "CSCO");
insert into ticker (t_id, companyname, ticker) values (8, "DowDuPont Inc.", "DWDP");
insert into ticker (t_id, companyname, ticker) values (9, "Exxon Mobil Corporation", "XOM");
insert into ticker (t_id, companyname, ticker) values (10, "Intel Corporation", "INTC");
insert into ticker (t_id, companyname, ticker) values (11, "International Business Machines Corporation", "IBM");
insert into ticker (t_id, companyname, ticker) values (12, "Johnson & Johnson", "JNJ");
insert into ticker (t_id, companyname, ticker) values (13, "JPMorgan Chase & Co.", "JPM");
insert into ticker (t_id, companyname, ticker) values (14, "McDonald's Corporation", "MCD");
insert into ticker (t_id, companyname, ticker) values (15, "Merck & Co., Inc.", "MRK");
insert into ticker (t_id, companyname, ticker) values (16, "Microsoft Corporation", "MSFT");
insert into ticker (t_id, companyname, ticker) values (17, "NIKE, Inc.", "NKE");
insert into ticker (t_id, companyname, ticker) values (18, "Pfizer Inc.", "PFE");
insert into ticker (t_id, companyname, ticker) values (19, "The Boeing Company", "BA");
insert into ticker (t_id, companyname, ticker) values (20, "The Coca-Cola Company", "KO");
insert into ticker (t_id, companyname, ticker) values (21, "The Goldman Sachs Group, Inc.", "GS");
insert into ticker (t_id, companyname, ticker) values (22, "The Home Depot, Inc.", "HD");
insert into ticker (t_id, companyname, ticker) values (23, "The Procter & Gamble Company", "PG");
insert into ticker (t_id, companyname, ticker) values (24, "The Travelers Companies, Inc.", "TRV");
insert into ticker (t_id, companyname, ticker) values (25, "The Walt Disney Company", "DIS");
insert into ticker (t_id, companyname, ticker) values (26, "United Technologies Corporation", "UTX");
insert into ticker (t_id, companyname, ticker) values (27, "UnitedHealth Group Incorporated", "UNH");
insert into ticker (t_id, companyname, ticker) values (28, "Verizon Communications Inc.", "VZ");
insert into ticker (t_id, companyname, ticker) values (29, "Visa Inc.", "V");
insert into ticker (t_id, companyname, ticker) values (30, "Walgreens Boots Alliance, Inc.", "WBA");
insert into ticker (t_id, companyname, ticker) values (31, "Walmart Inc.", "WMT");

insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (2, 33.50, 40.61, 11.35, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (3, 75.70, 1.766, 37.47, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (4, 40.28, 18.55, 82.25, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (5, 71.39, 92.83, 34.46, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (6, 73.00, 70.13, 8.370, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (7, 31.37, 21.15, 15.30, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (8, 71.90, 54.06, 55.30, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (9, 86.46, 56.25, 8.793, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (10, 95.19, 40.31, 52.51, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (11, 51.14, 3.977, 43.05, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (12, 20.14, 19.68, 89.74, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (13, 77.59, 18.07, 10.43, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (14, 24.82, 83.92, 84.86, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (15, 24.55, 91.49, 45.09, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (16, 74.77, 50.44, 79.97, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (17, 75.21, 78.38, 38.14, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (18, 83.76, 94.70, 26.18, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (19, 44.77, 51.77, 56.57, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (20, 88.29, 46.61, 7.222, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (21, 20.44, 11.86, 5.800, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (22, 63.30, 15.19, 49.41, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (23, 82.92, 56.12, 68.97, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (24, 31.61, 23.99, 70.61, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (25, 95.58, 4.372, 97.54, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (26, 89.91, 6.019, 78.04, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (27, 96.07, 1.709, 10.58, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (28, 94.41, 73.49, 4.660, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (29, 53.92, 1.985, 28.20, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (30, 26.60, 96.27, 48.34, NOW());
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (31, 49.76, 35.48, 18.78, NOW());

insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (1, 68.5, 68.61, 60.35, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (2, 31.5, 38.61, 9.35, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (3, 73.7, 1, 35.47, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (4, 38.28, 16.55, 80.25, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (5, 69.39, 90.83, 32.46, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (6, 71, 68.13, 6.37, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (7, 29.37, 19.15, 13.3, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (8, 69.9, 52.06, 53.3, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (9, 84.46, 54.25, 6.793, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (10, 93.19, 38.31, 50.51, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (11, 49.14, 1.977, 41.05, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (12, 18.14, 17.68, 87.74, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (13, 75.59, 16.07, 8.43, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (14, 22.82, 81.92, 82.86, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (15, 22.55, 89.49, 43.09, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (16, 72.77, 48.44, 77.97, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (17, 73.21, 76.38, 36.14, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (18, 81.76, 92.7, 24.18, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (19, 42.77, 49.77, 54.57, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (20, 86.29, 44.61, 5.222, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (21, 18.44, 9.86, 3.8, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (22, 61.3, 13.19, 47.41, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (23, 80.92, 54.12, 66.97, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (24, 29.61, 21.99, 68.61, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (25, 93.58, 2.372, 95.54, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (26, 87.91, 4.019, 76.04, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (27, 94.07, 1, 8.58, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (28, 92.41, 71.49, 2.66, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (29, 51.92, 1, 26.2, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (30, 24.6, 94.27, 46.34, "2018-01-01");
insert into stockmarket (t_id, currentvalue, openingvalue, closingvalue, stock_date) values (31, 47.76, 33.48, 16.78, "2018-01-01");






















