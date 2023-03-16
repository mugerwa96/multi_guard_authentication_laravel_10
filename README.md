#GUARDS <br>
As a developer, sometimes we need to develop a system where we have multiple types of roles and a table for each role type.
For example users, admins, reviewers,<br>
Guards
You could think of a guard as a way of supplying the logic that’s used to identify the authenticated users. In the core, Laravel provides different guards like session and token. The session guard maintains the state of the user in each request by cookies, and on the other hand the token guard authenticates the user by checking a valid token in every request.



Providers
If the guard defines the logic of authentication, the authentication provider is responsible for retrieving the user from the back-end storage. If the guard requires that the user must be validated against the back-end storage, then the implementation of retrieving the user goes into the authentication provider.

Laravel ships with two default authentication providers—Database and Eloquent. The Database authentication provider deals with the straightforward retrieval of the user credentials from the back-end storage, while Eloquent provides an abstraction layer that does the needful.<br>

You can check the default guards in the config/auth.php file.
