1. Start VM in virtualbox
2. Use nmap to find VM's host-only adapter's IP address.
3. Visit VM's web server on port 80 to get to the default wristwatch page.
4. Click on account icon in the top right to access the login page.
5. Put in anything for the username, and a password that hashes in SHA256 to 0e + a bunch of numbers.
6. Flag is printed to the page.

This works because of the hashing check in login-attempt.php:
```
  $stored_hash = "0e92299296652799688472441889499080435414654298793501210067779366";
  $hashed_input = hash("sha256", $input_password);

  // VULNERABILITY: Using '==' to compare can turn both strings to integers, so the hash starting with 0e will cause juggling.

  if ($hashed_input == $stored_hash) {
    echo "Welcome admin, flag is: pracsec{clown_juggling}\n";
```

By default, PHP "juggles" some strings into other types when using '==' or '!=' for comparisons. In particular, any string with integers, an 'e', and more integers will be translated into an integer in scientific notation. For example, "5e7" becomes the integer 5 x 10^7. The issue arises when our admin login's hashed password comes out as "0e" + a bunch of numbers. Then, '==' evaulates it as 0. Thus, there are a large list of hash collisions that will allow access to the site and the flag.

It would be very impressive if someone tried one of these colliding hashes immediately in the login prompt, so we included a bunch of hint pages that make the challenges more reasonable. 
Notably, the login page sends the password in a post request to login-attempt.php. If the user tries to visit login-attempt.php, they are redirected to clownworld.html.

This clown page is also accessible through the main watch pages. If a user scrolls to the bottom of the index page, they will see 
