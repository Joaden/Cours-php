# 1.connection to mysql :
Choose one of these versions:
`mysql -u yourUserName -p`  (password not precised, so will be asked at next line)
`mysql -user=yourUserName -p` (password not precised, so will be asked at next line)
`mysql --user=yourUserName --password` (password not precised, so will be asked at next line)
`mysql --user=yourUserName --password=yourPassword` (password will stay in shell history)

optional: add these parameters to precise a host:
`-h yourHostAddress`   
`--host=yourHostAddress`   


# 2. create the database :

## a. METHOD :  without verification if it exist: 

```sql
CREATE DATABASE cours_denis 
CHARACTER SET = 'utf8mb4'
COLLATE = 'utf8mb4_general_ci';
```

## b. METHOD : with verification if it exist:

```sql
CREATE DATABASE IF NOT EXISTS cours_denis
CHARACTER SET = 'utf8mb4'
COLLATE = 'utf8mb4_general_ci';
```

## c. METHOD : DELETE ( we use 'DROP') with command `IF IT EXIST`

```sql
DROP DATBASE IF EXISTS cours_denis;
```

puis

```sql
CREATE DATABASE cours_denis
CHARACTER SET = 'utf8mb4'
COLLATE = 'utf8mb4_general_ci';
```

# 3. logout,  then send a file in your recently-created-database :
in order :
1. programmeName :  `mysql` 
2. username :
   1. short: `-u yourUserName` or long: `--user=yourUserName`
   2. short: `-p yourPassword` or long: `--password=yourPassword`
3. password
   1. we don't precise so it ask at next line :
      1. short: `-p` or long: `--password`
   2. we precise BUT IT WILL STAY IN YOUR BASH/SHELL HISTORY 
      1. short: `-p yourPassword` or long: `--password=yourPassword`
4. which database to work in : (OPTIONAL)
   1. `yourDatabaseName`
5. send your file into the script `< yourFile.sql` 


So all are correct :
`mysql -u yourUserName -p yourDatabaseName < yourFile.sql`
`mysql -u yourUserName -p yourPassword yourDatabaseName < yourFile.sql`
`mysql -u yourUserName --password=yourPassword yourDatabaseName < yourFile.sql`
`mysql --user=yourUserName --password=yourPassword yourDatabaseName < yourFile.sql`

in my case :
mysql --user=root --password=_______ cours_denis < 20201120_database_installation.sql