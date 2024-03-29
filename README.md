Steps for installing:
1. Clone repository
2. Change to the correct directory "/secret-messages"
3. Run "composer install" in your terminal
4. Run "npm i"
5. Run "cp .env.example .env"
6. Run "php artisan key:generate"
7. Run "a migrate --seed"
8. Laravel will prompt you to create a database called "secret-message", press yes.
9. Go to web browser and go to http://127.0.0.1:8000/
10. Click "login" in the top right corner
11. Username is test@example.com and password is test123
12. Enter who the message is for, in this case "Test User 2"
13. Enter a message of your choice
14. Enter a decryption key of your choice
15. Click "send message" and you should see a message that it was successfully sent.
16. Click "Test User 1" in top right and log out.
17. Log back in but this time username is test2@example.com, password test123
18. Click "Read Message" link at top.
19. Enter the decryption key you chose
20. Read your message, after 5 seconds it will be deleted!
