# Web-Development
1) use xampp, apache and mysql
2) Run on localhost


@@@@Description@@@@
1) User have to register using registration form and jump to login page
2) At login page, user have to enter username, if he/she registered then jump to password page
3) At password page, user have to enter password, if not remember then forget.
4) Welcome to World Shop

@@@@@@Encryption@@@@@

I have added little bit of one-way encryption such that username, emailid, password is encrypt in such a way that admin couldn't guess it (only if he/she don't know the salt text), as username, emailid, password is one way encryption with random encrypted salt with 3 different algorithm of php.

AS simple, 1) random text salt => encryption=> Encrypted salt
2)username => 3 different algorithm + Encrypted salt => Encrypted username....... So on

@@@@@Cart@@@@@
Firstly all the product user add to cart are stored in session (not server database), as user complete shoping he/she either checkout or logout.
While checkout or logout all the product are now stored in server database so user don't have to start form bottom or we say as all product he/she want to but later are in cart.
Here is tricky part cart.php/ cart page show only session value, so when user logout session got destroy but when user login again all the product are firstly stored in session and then display on cart page........ So it looks like it is fetching from database but it show session value. 
