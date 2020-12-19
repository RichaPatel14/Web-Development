# Web-Development

1) User have to register using registration form and jump to login page
2) At login page, user have to enter username, if he/she registered then jump to password page
3) At password page, user have to enter password, if not remember then forget.
4) Welcome to World Shop

@@@@@@Encryption@@@@@

I have added little bit of one-way encryption such that username, emailid, password is encrypt in such a way that admin couldn't guess it (only if he/she don't know the salt text), as username, emailid, password is one way encryption with random encrypted salt with 3 different algorithm of php.

AS simple, 1) random text salt => encryption=> Encrypted salt
2)username => 3 different algorithm + Encrypted salt => Encrypted username....... So on
